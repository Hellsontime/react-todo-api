<?php

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Http\Response;

class TodoStatusRepository implements TodoStatusRepositoryInterface
{
    private Todo $_todo;

    public function __construct(Todo $todo)
    {
        $this->_todo = $todo;
    }

    public function updateTodoStatus(int $todoId, array $statusArray): Response
    {
        $this->_todo
            ->find($todoId)
            ->update($statusArray);

        $updatedTodo = $this->_todo
            ->find($todoId)
            ->toArray();

        return response($updatedTodo, 201);
    }
}
