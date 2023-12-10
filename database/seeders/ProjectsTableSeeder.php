<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Functions\Helper;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $projects = config('projects');
        foreach ($projects as $project) {
            $project['slug'] = Helper::generateSlug($project['title'], Project::class);
            $type = Type::inRandomOrder()->first();
            $project['type_id'] = $type->id;
            DB::table('projects')->insert($project);
        }
    }
}
