<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleTeam extends Model
{
    use HasFactory;

    protected $table = "module_team";
    protected $fillable = ['module_id', 'team_id'];
    public $timestamps = false;
}
