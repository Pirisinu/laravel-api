<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projects(){

    $projects = Project::all();
    $types = Type::all();
    $technologies = Technology::all();
    return response()->json([
        'success' => true,
        'projects' => $projects,
        'types' => $types,
        'technologies' => $technologies,
    ]);
    }
    public function showBySlug($slug)
    {
        $project = Project::where('slug', $slug)->first();

        return response()->json($project);
    }

}
