<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\StoreProjectRequest;
use App\Http\Requests\Api\V1\UpdateProjectRequest;
use App\Http\Requests\Api\V1\ReplaceProjectRequest;
use App\Http\Resources\V1\ProjectResource;
use App\Models\Project;
use App\Models\User;
use App\ApiResponses;
use App\Http\Filters\V1\ProjectFilter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectController extends ApiController
{
    use ApiResponses;
    /**
     * Display a listing of the resource.
     */
    public function index(ProjectFilter $filters)
    {

        return ProjectResource::collection(Project::filter($filters)->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        try {
            $user = User::findOrFail($request->input('data.relationships.admin.data.id'));
        }
        catch (ModelNotFoundException $exception) {
            return $this->ok('user not found', [
                'error' => 'provided user id does not exist',
            ]);
        }

        return new ProjectResource($request->mappedAttributes());

    }

    /**
     * Display the specified resource.
     */
    public function show(int $project_id)
    {

        try {
            $project = Project::findOrFail($project_id);

            if ($this->include('admin')) {
                return new ProjectResource($project->load('admin'));
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
    public function update(UpdateProjectRequest $request, int $project_id)
    {
        try {
            $project = Project::findOrFail($project_id);

            $project->update($request->mappedAttributes());

            return new ProjectResource($project);
        }
        catch (ModelNotFoundException $exception) {
            return $this->error('Project Not Found', 404);
        }
    }

     /**
     * Update the specified resource in storage.
     */
    public function replace(ReplaceProjectRequest $request, int $project_id)
    {
        try {
            $project = Project::findOrFail($project_id);

            $project->update($request->mappedAttributes());

            return new ProjectResource($project);
        }
        catch (ModelNotFoundException $exception) {
            return $this->error('Project Not Found', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $project_id)
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
