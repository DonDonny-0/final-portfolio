<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use App\Http\Requests\Api\V1\BaseProjectRequest;

class UpdateProjectRequest extends BaseProjectRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'data.attributes.title' => 'sometimes|string',
            'data.attributes.feature_image' => 'sometimes|string',
            'data.attributes.description' => 'sometimes|string',
            'data.attributes.tech_stack' => 'sometimes|array',
            'data.attributes.github_url' => 'sometimes|string',
        ];
    }
}
