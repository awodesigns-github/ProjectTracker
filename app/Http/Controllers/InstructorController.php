<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Instructor;
use App\Models\Module;
use App\Models\Project;
use App\Models\ProjectInstructor;
use App\Models\Student;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        // Tasks count per project
        $tasksCount = Instructor::instructorTasksCountPerProject();

        return view('spcs.instructor.index', [
            'userRole' => $this->userRole,
            'instructorDetails' => $instructorDetails,
            'projectCount' => $projectCount,
            'projectDetails' => $projectDetails,
            'taskCount' => $tasksCount
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
     * Show the form for creating a new resource.
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $instructorId = Instructor::query()->where('user_id', Auth::user()->id)->first();

        $request->validate([
            'name' => 'required',
            'description' => 'required|max:255',
            'status' => 'required',
            'module_id' => 'required',
            'task_file' => 'required|file|mimes:pdf,docx|max:2048'
        ]);

        if ($request->hasFile('task_file')) {
            $taskFile = $request->file('task_file')->store('public');
        }

        try {
            DB::beginTransaction();

            $project = Project::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'module_id' => $request->module_id,
            ]);
    
            $task = Task::create([
                'task_name' => $request->task_name,
                'task_description' => $request->task_description,
                'project_id' => $project->id,
                'task_url' => $request->task_url,
            ]);

            $projectInstructor = ProjectInstructor::create([
                'project_id' => $project->id,
                'instructor_id' => $instructorId->id,
            ]);
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
        $projectTasks = $projectDetails->task;
        $projectStudents = $projectDetails->module->student;
        return view('spcs.instructor.showProject',[
            'userRole' => $this->userRole,
            'projectDetails' => $projectDetails,
            'projectTasks' => $projectTasks,
            'projectStudents' => $projectStudents
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
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
}
