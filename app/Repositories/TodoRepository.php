<?php

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Http\Response;

class TodoRepository implements TodoRepositoryInterface
{
    private Todo $_todo;

    public function __construct(Todo $todo)
    {
        $this->_todo = $todo;
    }

    public function getUserTodos(int $userId): array
    {
        return $this->_todo
            ->where('user_id', $userId)
            ->get()
            ->toArray();
    }

    public function createUserTodo(array $requestBody): array
    {
        $createdTodo = $this->_todo->create($requestBody);

        return $this->_todo
            ->find($createdTodo['id'])
            ->toArray();
    }

    public function getUserTodoById(int $userId, int $todoId): array
    {
        return $this->_todo
            ->where('id', $todoId)
            ->where('user_id', $userId)
            ->get()
            ->toArray();
    }

    public function updateUserTodo(array $requestBody): Response
    {
        $this->_todo
            ->find($requestBody['id'])
            ->update($requestBody);

        $updatedTodo = $this->_todo
            ->find($requestBody['id'])
            ->toArray();

        return response($updatedTodo, 201);
    }

    public function deleteUserTodo(int $todoId)
    {
        $todo = $this->_todo->find($todoId);
        $todo->delete();

        return response([
            "message" => "Todo deleted successfully"
        ], 201);
    }
}
