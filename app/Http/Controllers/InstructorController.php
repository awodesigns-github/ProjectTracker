<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Instructor;
use App\Models\Module;
use App\Models\Project;
use App\Models\ProjectInstructor;
use App\Models\Student;
use App\Models\Task;
use App\Rules\ValidProjectDueDate;
use App\Rules\ValidTaskDueDate;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{
    private $userRole = 'instructor';
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // instructor details
        $instructorDetails = Instructor::query()->where('id', Auth::user()->id)->first();
        
        // instructor's project count
        $projectCount = Instructor::instructorProjectCount();

        // project details
        $projectDetails = Instructor::instructorProjectObject()->first()->project;

        // Project summary
        $projectStatistics = Instructor::instructorProjectObject()->first()->project()
                        ->where('status', 'O')
                        ->withCount('task')
                        ->withCount([
                            'task as completed_tasks' => function($query) {
                                $query->where('task_status', 'C');
                            },
                            'task as inprogress_tasks' => function($query) {
                                $query->where('task_status', 'I');
                            },
                            'task as pending_tasks' => function($query) {
                                $query->where('task_status', 'P');
                            },
                        ])
                        ->orderBy('task_count', 'desc')
                        ->take(5)
                        ->get();

        // dd($projectStatistics);


        $openProjectsCount = Instructor::instructorProjectObject()->first()->project()->where('status', 'O')->count();
        $closedProjectsCount = Instructor::instructorProjectObject()->first()->project()->where('status', 'C')->count();


        // Tasks count per project
        $tasksCount = Instructor::totalTasksCount();

        return view('spcs.instructor.index', [
            'userRole' => $this->userRole,
            'instructorDetails' => $instructorDetails,
            'projectCount' => $projectCount,
            'projectDetails' => $projectDetails,
            'taskCount' => $tasksCount,
            'projectStatistics' => $projectStatistics,
            'openProjects' => $openProjectsCount,
            'closedProjects' => $closedProjectsCount
        ]);
    }

    /**
     * Show all resources
     */
    public function allResources(Request $request)
    {
        $projectDetails = Instructor::instructorProjectObject()->first()->project;
        $modules = Instructor::query()->where('user_id', Auth::user()->id)->first()->module;

        if ($request->ajax()) {
            $projects = Instructor::filter($request)->first()->project->where('status', $request->input('status'));
            $projectsByModule = Instructor::filter($request)->first()->project->where('module_id', $request->input('module'));
            return response()->json([
                'data' => $projects
            ]);
        }

        return view('spcs.instructor.sort', [
            'userRole' => $this->userRole,
            'projectDetails' => $projectDetails,
            'modules' => $modules
        ]);
    }

    /**
     * Show all students
     */
    public function allStudents(Request $request)
    {
        $studentDetails = Instructor::query()->where('user_id', Auth::user()->id)->with('student')->first()->student;

        if ($request->ajax()) {
            if ($request->input('cohort')) {
                $students = Instructor::filter($request)->first()->student->where('cohort_id', $request->input('cohort'));
            } else {
                $students = Instructor::filter($request)->first()->student->where('team_id', $request->input('team'));
            }

            $studentArray = [];
            foreach ($students as $details) {
                $student = Student::query()->where('id', $details->id)->with(['user', 'cohort', 'course', 'team'])->first();
                $studentArray[] = $student;
            }
            
            return response()->json([
                'data' => $studentArray
            ]);
        } 

        
        return view('spcs.instructor.showStudents', [
            'userRole' => $this->userRole,
            'studentDetails' => $studentDetails,
        ]);
    }

    /**
     * Show the form for creating a new project.
     */
    public function createProject()
    {
        $modules = Module::query()->get();

        return view('spcs.instructor.createProject', [
            'userRole' => $this->userRole,
            'modules' => $modules
        ]);
    }

    /**
     * Show the form for creating a new task.
     */
    public function createTask(Project $id)
    {
        return view('spcs.instructor.createTask', [
            'userRole' => $this->userRole,
            'projectName' => $id->name,
            'projectId' => $id->id
        ]);
    }

    public function storeTask(Request $request)
    {
        
        $request->validate([
            'task_name' => ['required'],
            'task_description' =>['required', 'max:255'],
            'task_status' => ['required'],
            // 'due_date' => ['nullable', 'date_format: Y-m-d H:i:s', new ValidTaskDueDate($request->project_id)],
            'project_id' =>['required'],
            'task_file' => ['nullable', 'file', 'mimes:pdf,docx', 'max:2048']
        ]);

        if ($request->hasFile('task_file')) {
            $taskFile = $request->file('task_file')->store('public');
            $taskUrl = asset('storage/'.basename($taskFile));
        } else {
            $taskUrl = null;
        }

        try {
            DB::beginTransaction();
    
            $task = Task::create([
                'task_name' => $request->task_name,
                'task_description' => $request->task_description,
                'task_status' => $request->task_status,
                'project_id' => $request->project_id,
                // 'task_due_date' => $request->due_date,
                'task_url' => $taskUrl,
            ]);

            DB::commit();

            return redirect()->route('instructor-dashboard')->with('taskCreationSuccess', 'Task added successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e);
            return redirect()->back();
        }

    }

    /**
     * Store a newly created project and task in storage.
     */
    public function store(Request $request)
    {
        $instructorId = Instructor::query()->where('user_id', Auth::user()->id)->first();

        $request->validate([
            'name' => ['required'],
            'description' => ['required', 'max:255'],
            'status' => ['required'],
            'module_id' => ['required'],
            // 'due_date' => ['nullable', 'date_format: Y-m-d H:i:s'],
        ]);

        try {
            DB::beginTransaction();

            $project = Project::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'module_id' => $request->module_id,
            ]);

            $projectInstructor = ProjectInstructor::create([
                'project_id' => $project->id,
                'instructor_id' => $instructorId->id,
            ]);

            Log::info("Project: . $request->name . created successfully by " . Auth::user()->name);

            DB::commit();

            return redirect()->route('instructor-dashboard')->with('creationSuccess', 'Project created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e);
            return redirect()->back();
        }
    }


    /**
     * Display the specified project information
     */
    public function showProjectDetails(Project $id)
    {
        $projectDetails = Project::query()->where('id', $id->id)->with(['task', 'module'])->first();
        $projectTask = $projectDetails->task;
        $projectStudents = $projectDetails->module->student;
        return view('spcs.instructor.showProject',[
            'userRole' => $this->userRole,
            'projectDetails' => $projectDetails,
            'projectTasks' => $projectTask,
            'projectStudents' => $projectStudents
        ]);
    }

    public function showStudentDetails(Student $id)
    {
        return view('spcs.instructor.showStudentDetails', [
            'userRole' => $this->userRole,
            'studentDetails' => $id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing Project and its associated tasks.
     */
    public function edit(Project $id)
    {
        // dd($id->task);
        $modules = Module::query()->get();

        return view('spcs.instructor.editProject', [
            'userRole' => $this->userRole,
            'projectDetails' => $id,
            'modules' => $modules,
            'projectTasks' => $id->task
        ]);
    }

    /**
     * Show the form for editing a task
     */
    public function editTask(Task $id)
    {
        // dd($id);
        $projectDetails = Project::query()->where('id', $id->project_id)->first();
        return view('spcs.instructor.editTask', [
            'userRole' => $this->userRole,
            'task' => $id,
            'projectDetails' => $projectDetails
        ]);
    }


    /**
     * Update the edited task
     */
    public function updateTask(Request $request, Task $id)
    {
        $request->validate([
            'task_name' => ['required'],
            'task_description' =>['required', 'max:255'],
            'task_status' => ['required'],
            // 'due_date' => ['nullable', 'date_format: Y-m-d H:i:s', new ValidTaskDueDate($request->project_id)],
            'project_id' =>['required'],
            'task_file' => ['nullable', 'file', 'mimes:pdf,docx', 'max:2048']
        ]);

        // dd($request);

        if ($request->hasFile('task_file')) {
            $taskFile = $request->file('task_file')->store('public');
            $taskUrl = asset('storage/'.basename($taskFile));
        } else {
            $taskUrl = null;
        } 

        try {
            DB::beginTransaction();

            Task::query()->where('id', $id->id)->update([
                'task_name' => $request->task_name,
                'task_description' => $request->task_description,
                'task_status' => $request->task_status,
                // 'task_due_date' => $request->due_date,
                'project_id' => $id->project_id,
                'task_url' => $taskUrl
            ]);

            DB::commit();

            Log::info("Task: . $id->task_name . updated successfully by " . Auth::user()->name);

            $projectDetails = Project::query()->where('id', $id->project_id)->first();

            return redirect()->route('instructor-show-project', ['id' => $projectDetails]);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $id)
    {
        $instructorId = Instructor::query()->where('user_id', Auth::user()->id)->first();

        $request->validate([
            'name' => 'required',
            'description' => 'required|max:255',
            'status' => 'required',
            'module_id' => 'required',
        ]);       

        try {
            DB::beginTransaction();

            Project::query()->where('id', $id->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'module_id' => $request->module_id,
            ]);

            ProjectInstructor::query()->where('project_id', $id->id)->update([
                'project_id' => $id->id,
                'instructor_id' => $instructorId->id,
            ]);

            Log::info("Project: . $id->name . updated successfully by " . Auth::user()->name);

            DB::commit();

            return redirect()->route('instructor-dashboard');

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        //
    }

    /**
     * Delete a project from the database
     */
    public function destroyProject(Project $id)
    {
        // dd($id);
        $project = Project::findOrFail($id->id);
        $tempName = $id->name;

        DB::beginTransaction();

        try {
            $project->delete();
            Log::info('Instructor with id ' . Auth::user()->id . ' and name ' . Auth::user()->name . ' deleted project ' . $tempName);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);
            return redirect()->back()->with('deletionError', 'Deletion Error... Please check logs');
        }

        return redirect()->route('instructor-dashboard')->with('projectDeletion', 'Project deleted successfully!');
    }
}
