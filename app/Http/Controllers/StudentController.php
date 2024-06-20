<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Project;
use App\Models\Student;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    private $userRole = 'student';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::query()->where('user_id', Auth::user()->id)->first();

        $studentProjectsCount = Student::studentProjectCount();
        $completedTasks = Student::completedTasks($student->id);
        $pendingTasks = Student::pendingTasks($student->id);

        $studentProjects = Student::studentProjects();
        
        $projects = collect();

        foreach ($studentProjects as $modules) {
            foreach ($modules->project as $project) {
                if (is_null($project->deleted_at) && $project->status != 'C') {
                    $projects->push($project);
                }
            }
        }

        return view('spcs.student.index', [
            'userRole' => $this->userRole,
            'studentProjectCount' => $studentProjectsCount,
            'completedTasksCount' => $completedTasks->task->count(),
            'pendingTasksCount' => $pendingTasks->task->count(),
            'studentProjects' => $projects,
            'modules' => $studentProjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showProject(Project $id)
    {
        $modules = Student::studentProjects(); // for the side bar
        $student = Student::query()->where('user_id', Auth::user()->id)->first();

        $studentWithTasks = Student::with(['task' => function($query) use ($id) {
            $query->where('project_id', $id->id)
                    ->select('tasks.id', 'tasks.task_name', 'tasks.task_description', 'tasks.project_id');
        }])->findOrFail($student->id);

        return view('spcs.student.showProjectDetails', [
            'userRole' => $this->userRole,
            'project' => $id,
            'studentInformation' => $student,
            'tasks' => $studentWithTasks->task,
            'modules' => $modules
        ]);
    }

    public function sortProjects(Module $id)
    {
        $modules = Student::studentProjects();

        $projects = Project::query()->where('module_id', $id->id)->where('status', 'O')->get();

        return view('spcs.student.sortProjects', [
            'userRole' => $this->userRole,
            'modules' => $modules,
            'module' => $id,
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
