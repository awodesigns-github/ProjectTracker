<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Instructor;
use App\Models\Project;
use App\Models\Student;
use App\Models\Team;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $userRole = 'admin';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Total instructors count
        $instructorsCount = Instructor::query()->count();

        // Total student count
        $studentCount = Student::query()->count();

        // Total teams count
        $teamsCount = Team::query()->count();

        $projects = Project::query()->with('task')->orderBy('name')->get();
        
        // Fetch instructors with their respective cohorts
        $instructorCohortCount = Instructor::instructorsCountPerCohort();
        // dd($instructorCohortCount);

        // Fetch all cohorts
        $cohortList = Cohort::query()->get();

        return view('spcs.index', [
            'userRole' => $this->userRole,
            'instructorsCount' => $instructorsCount,
            'studentsCount' => $studentCount,
            'teamsCount' => $teamsCount,
            'projects' => $projects,
            'cohortList' => $cohortList
        ]);
    }

    /**
     * Show the form for creating an instructor resource.
     */
    public function createInstructor()
    {
        return view('spcs.createInstructor', [
            //
        ]);
    }

    /**
     * Show the form for creating a student resource.
     */
    public function createStudent()
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
    public function show(string $id)
    {
        //
    }

    /**
     * Display the instructors of a the specified cohort
     */
    public function showInstructors(Cohort $id)
    {

        // Fetch all cohorts
        $cohortList = Cohort::query()->get();

        $instructors = Cohort::query()->where('id', $id->id)->with('instructor')->first()->instructor;
        // dd($instructors);

        return view('spcs.showInstructors', [
            'userRole' => $this->userRole,
            'cohortList' => $cohortList,
            'instructors' => $instructors
        ]);
    }

    /**
     * Display individual instructor details
     */
    public function showInstructorDetails(Instructor $id)
    {
        // Fetch all cohorts
        $cohortList = Cohort::query()->get();

        // Fetch instructor and details
        $instructors = Instructor::query()->where('id', $id->id)->with('project')->first();

        $instructorProjects = $instructors->project;
        // dd($instructorProjects);

        return view('spcs.instructorDetails', [
            'cohortList' => $cohortList,
            'userRole' => $this->userRole,
            'instructor' => $instructors,
            'instructorProjects' => $instructorProjects
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
