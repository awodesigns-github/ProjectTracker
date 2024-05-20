<?php

namespace App\Http\Controllers;

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
                // find the team members and their counts
        $teamId = Student::query()->where('user_id', Auth::user()->id)->with('team')->first()->team->id;
        $teamMembersCount = Team::query()->where('id', $teamId)->first()->student->count();

        // find the projects associated with this team and their counts
        $teamProjectsCount = Team::query()->where('id', $teamId)->with('project')->first()->project->count();

        // find the number of Tasks for each project
        $teamProjects = Team::query()->where('id', $teamId)->with('project')->first()->project;

        $teamTaskCount = 0;
        foreach ($teamProjects as $projects) {
                $teamTaskCount += $projects->task->count();
        }

        return view('spcs.index', [
            'teamId' => $teamId,
            'projects' => $teamProjects,
            'projectCount' => $teamProjectsCount,
            'taskCount' => $teamTaskCount,
            'teamMembersCount' => $teamMembersCount,
            'userRole' => $this->userRole
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
    public function show(Student $student)
    {
        //
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
