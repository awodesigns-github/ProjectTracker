<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Task;
use App\Models\TaskStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TaskStudent::create([
        //     'task_id' => 1,
        //     'student_id' => 1,
        // ]);

        // TaskStudent::create([
        //     'task_id' => 2,
        //     'student_id' => 1,
        // ]);

        // TaskStudent::create([
        //     'task_id' => 1,
        //     'student_id' => 2,
        // ]);

        $students = Student::all();
        $tasks = Task::all();

        foreach ($tasks as $task) {
            $assignedStudent = $students->random(rand(1,2));
            foreach ($assignedStudent as $student) {
                $student->task()->attach($task->id, ['status' => 'I']);
            }
        }
    }
}
