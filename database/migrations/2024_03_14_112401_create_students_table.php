<?php

use App\Models\Campus;
use App\Models\Cohort;
use App\Models\Course;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number');
            $table->string('github_username');
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Cohort::class);
            $table->foreignIdFor(Campus::class);
            $table->foreignIdFor(Course::class);
            $table->foreignIdFor(Team::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
