<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Instructor;
use App\Models\Project;
use App\Models\Student;
use App\Services\GitHubService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    private $userRole = 'instructor';
    protected $gitHubService;

    public function __construct(GitHubService $gitHubService)
    {
        $this->gitHubService = $gitHubService;
    }
    
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

        if ($request->ajax()) {
            $projects = Instructor::filter($request)->first()->project->where('status', $request->input('status'));
            return response()->json([
                'data' => $projects
            ]);
        }

        return view('spcs.instructor.sort', [
            'userRole' => $this->userRole,
            'projectDetails' => $projectDetails
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
        return view('instructor.createProject', [
            //
        ]);
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
