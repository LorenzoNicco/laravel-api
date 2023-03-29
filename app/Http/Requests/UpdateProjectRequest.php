<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// utilities
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                Rule::unique('projects')->ignore($this->project->id)
            ],
            'description' => 'required|min:10',
            'img' => 'nullable|image',
            'delete-img' => 'nullable',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|array|exists:technologies,id'
        ];
    }
}
