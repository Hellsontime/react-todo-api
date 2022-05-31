<?php

namespace App\Repositories;

interface TodoRepositoryInterface
{
    public function getUserTodos(int $userId);
    public function createUserTodo(array $requestBody);
    public function getUserTodoById(int $userId, int $todoId);
    public function updateUserTodo(array $requestBody);
    public function deleteUserTodo(int $todoId);
}
