<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class BaseProjectRequest extends FormRequest
{
    public function mappedAttributes() {
        $attributeMap = [
            'data.attributes.title' => 'title',
            'data.attrtibutes.feature_image' => 'feature_image',
            'data.attributes.description' => 'description',
            'data.attributes.tech_stack' => 'tech_stack',
            'data.attributes.github_url' => 'github_url',
            'data.attributes.createdAt' => 'created_at',
            'data.attributes.updatedAt' => 'updated_at',
            'data.relationships.admin.data.id' => 'id',
        ];

        $attributesToUpdate = [];

        foreach ($attributeMap as $key => $attribute) {
            if ($this->has($key)) {
                $attributesToUpdate[$attribute] = $this->input($key);
            }
        }

        return $attributesToUpdate;
    }
}
