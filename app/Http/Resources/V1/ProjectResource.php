<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'project',
            'attributes' => [
                'title' => $this->title,
                'id' => $this->id,
                'feature_image' => $this->feature_image,
                'description' => $this->when(
                    $request->routeIs('projects.show'),
                    $this->description,
                ),
                'tech_stack' => $this->tech_stack,
                'github_url' => $this->github_url,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at
            ],
            'relationships' => [
                'author' => [
                    'data' => [
                        'type' => 'user',
                        'id' => $this->id,
                    ],
                    'links' => [
                        ['self' => 'todo'],
                    ]
                ]
            ],
            'includes' => new UserResource($this->whenLoaded('user')),
            'links' => [
                ['self' => route('projects.show', ['project' => $this->id])],
            ],
        ];
    }
}
