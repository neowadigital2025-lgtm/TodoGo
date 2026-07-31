<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Authorization is handled in the controller
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'workspace_id' => ['required', 'exists:workspaces,id'],
            'priority' => ['required', 'in:High,Medium,Low'],
            'status' => ['required', 'in:Todo,In Progress,Done'],
            'progress' => ['nullable', 'integer', 'between:0,100'],
            'due_date' => ['nullable', 'date'],
        ];
    }
}
