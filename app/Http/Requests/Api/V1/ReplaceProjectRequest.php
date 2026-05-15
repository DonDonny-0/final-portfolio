<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use App\Http\Requests\Api\V1\BaseProjectRequest;

class ReplaceProjectRequest extends BaseProjectRequest
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
            'data.attributes.title' => 'required|string',
            'data.attributes.feature_image' => 'required|string',
            'data.attributes.description' => 'required|string',
            'data.attributes.tech_stack' => 'required|array',
            'data.attributes.github_url' => 'required|string',
        ];
    }
}
