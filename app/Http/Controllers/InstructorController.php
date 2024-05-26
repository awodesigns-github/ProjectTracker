<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // dd($projectDetails);

        // Tasks count per project
        $tasksCount = Instructor::instructorTasksCountPerProject();

        return view('spcs.instructor.index', [
            'userRole' => $this->userRole,
            'instructorDetails' => $instructorDetails,
            'projectCount' => $projectCount,
            'projectDetails' => $projectDetails
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
