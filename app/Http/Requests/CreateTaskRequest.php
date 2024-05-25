<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'assigned_by_id' => 'required|integer|exists:users,id',
            'assigned_to_id' => 'required|integer|exists:users,id',
        ];
    }
}
