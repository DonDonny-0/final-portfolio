<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\V1\ProjectFilter;
use App\Http\Resources\V1\ProjectResource;
use App\Models\Project;

class AdminProjectsController extends Controller
{
    public function index(int $admin, ProjectFilter $filters)
    {
       return ProjectResource::collection(
            Project::query()->where('user_id', $admin)->filter($filters)->paginate()
       );
    }
}
