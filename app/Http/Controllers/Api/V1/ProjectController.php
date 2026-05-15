<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreProjectRequest;
use App\Http\Requests\Api\V1\UpdateProjectRequest;
use App\Http\Resources\V1\ProjectResource;
use App\Models\Project;
use App\Models\User;
use App\ApiResponses;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectController extends ApiController
{
    use ApiResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProjectResource::collection( Project::all() );
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
    public function store(StoreProjectRequest $request)
    {
        try {
            $user = User::findOrFail($request->input('data.relationships.author.data.id'));
        }
        catch (ModelNotFoundException $exception) {
            return $this->ok('user not found', [
                'error' => 'provided user id does not exist',
            ]);
        }

        $model = [
            'title' => $request->input('data.attributes.title'),
            'feature_image' => $request->input('data.attributes.feature_image'),
            'description' => $request->input('data.attributes.description'),
            'tech_stack' => $request->input('data.attributes.tech_stack'),
            'github_url' => $request->input('data.attributes.github_url'),
        ];

        return new ProjectResource(Project::create($model));

    }

    /**
     * Display the specified resource.
     */
    public function show($project_id)
    {

        try {
            $project = Project::findOrFail($project_id);

            if ($this->include('author')) {
                return new ProjectResource($project->load('user'));
            }

            return new ProjectResource($project);
        }
        catch (ModelNotFoundException $exception) 
        {
            return $this->error('Project Not Found', 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($project_id)
    {
        try {
            $project = Project::findOrFail($project_id);
            $project->delete();

            return $this->ok("Project Banished Project Master!");
        }
        catch (ModelNotFoundException $exception) 
        {
            return $this->error('Project Not Found', 404);
        }
    }
}
