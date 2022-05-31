<?php

namespace App\Services;

interface TodoServiceInterface
{
    public function getUserTodos(int $userId);
    public function createUserTodo(int $userId, array $requestBody);
    public function getUserTodoById(int $userId, int $todoId);
    public function updateUserTodo(int $userId, int $todoId, array $requestBody);
    public function deleteUserTodo(int $todoId);
}
