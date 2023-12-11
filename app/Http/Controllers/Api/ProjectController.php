<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projects(){

    $projects = Project::with('type','technologies')->get();

    return response()->json([
        'success' => true,
        'projects' => $projects,

    ]);
    }
    public function showBySlug($slug)
    {
        $project = Project::where('slug', $slug)->with('type','technologies')->first();

        return response()->json($project);
    }

}
