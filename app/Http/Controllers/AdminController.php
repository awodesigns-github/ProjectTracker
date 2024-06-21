<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Project;
use App\Models\Student;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $userRole = 'admin';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructorsCount = Instructor::query()->count();

        $studentCount = Student::query()->count();

        $teamsCount = Team::query()->count();
        
        $projects = Project::withCount('task')->with('instructors')->get();

        $deletedProjects = Project::onlyTrashed()->get();

        $usersCount = User::query()->count();

        $courseCount = Course::query()->count();
        
        // Fetch instructors with their respective cohorts
        // $instructorCohortCount = Instructor::instructorsPerCohort();

        $cohortList = Cohort::query()->get();

        return view('spcs.admin.index', [
            'userRole' => $this->userRole,
            'instructorsCount' => $instructorsCount,
            'studentsCount' => $studentCount,
            'teamsCount' => $teamsCount,
            'projects' => $projects,
            'cohortList' => $cohortList,
            'deletedProjects' => $deletedProjects,
            'deletedProjectsCount' => $deletedProjects->count(),
            'usersCount' => $usersCount,
            'courseCount' => $courseCount,
            'closedProjectsCount' => $projects->where('status', 'C')->count(),
            'openProjectsCount' => $projects->where('status', 'O')->count(),
        ]);
    }

    /**
     * Show the form for creating an instructor resource.
     */
    public function createInstructor()
    {
        $cohortList = Cohort::query()->get();
        
        return view('spcs.admin.createInstructor', [
            'userRole' => $this->userRole,
            'cohortList' => $cohortList
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

    public function showStudents(Cohort $id)
    {
        $cohortList = Cohort::query()->get();
        $studentDetails = Student::query()->where('cohort_id', $id->id)->get();

        return view('spcs.admin.showStudents', [
            'userRole' => $this->userRole,
            'cohortList' => $cohortList,
            'studentDetails' => $studentDetails,
        ]);
    }

    public function showStudentDetails(Student $id)
    {
        $cohortList = Cohort::query()->get();
        $studentDetails = Student::query()->where('id', $id->id)->first();

        return view('spcs.admin.studentDetails', [
            'userRole' => $this->userRole,
            'cohortList' => $cohortList,
            'student' => $studentDetails
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showDeletedProjects()
    {
        $cohortList = Cohort::query()->get();

        $deletedProjects = Project::onlyTrashed()->get();

        return view('spcs.admin.showDeletedProjects', [
            'userRole' => $this->userRole,
            'cohortList' => $cohortList,
            'projectDetails' => $deletedProjects
        ]);
    }

    public function showDeletedProject($id)
    {
        $cohortList = Cohort::query()->get();
        $projectDetails = Project::withTrashed()->where('id', $id)->with(['task', 'module'])->first();
        $projectTask = $projectDetails->task;
        $projectStudents = $projectDetails->module->student;

        return view('spcs.admin.showProjectDetails', [
            'userRole' => $this->userRole,
            'cohortList' => $cohortList,
            'projectDetails' => $projectDetails,
            'projectStudents' => $projectStudents,
            'projectTasks' => $projectTask
        ]);
    }

    public function showProjectDetails(Project $id)
    {
        $cohortList = Cohort::query()->get();
        $projectDetails = Project::query()->where('id', $id->id)->with(['task', 'module'])->first();
        $projectTask = $projectDetails->task;
        $projectStudents = $projectDetails->module->student;

        return view('spcs.admin.showProjectDetails', [
            'userRole' => $this->userRole,
            'cohortList' => $cohortList,
            'projectDetails' => $projectDetails,
            'projectStudents' => $projectStudents,
            'projectTasks' => $projectTask
        ]);
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

        return view('spcs.admin.showInstructors', [
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

        return view('spcs.admin.instructorDetails', [
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
