<?php

namespace App\Http\Controllers\Task\Request;

use App\Service\Task\Dto\TaskDto;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function rules(): array{
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ];
    }

    public function toDto(): TaskDto
    {
        $validated = $this->validated();
        return new TaskDto(
            title: $validated['title'],
            description: $validated['description'],
            user_id: auth()->id(),
            status: 'pending',
        );
    }
}
