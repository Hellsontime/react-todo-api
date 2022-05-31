<?php

namespace App\Services;

use App\Models\Todo;
use App\Repositories\TodoRepositoryInterface;

class TodoService implements TodoServiceInterface
{
    private TodoRepositoryInterface $_todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->_todoRepository = $todoRepository;
    }

    public function getUserTodos(int $userId)
    {
        return $this->_todoRepository->getUserTodos($userId);
    }

    public function createUserTodo(int $userId, array $requestBody)
    {
        $todo = new Todo();
        $requestBody = $todo->setFromArray($requestBody);
        $requestBody['user_id'] = $userId;

        return $this->_todoRepository->createUserTodo($requestBody);
    }

    public function getUserTodoById(int $userId, int $todoId)
    {
        return $this->_todoRepository->getUserTodoById($userId, $todoId);
    }

    public function updateUserTodo(int $userId, int $todoId, array $requestBody)
    {
        $todo = new Todo();
        $requestBody = $todo->setFromArray($requestBody);
        $requestBody['id'] = $todoId;

        return $this->_todoRepository->updateUserTodo($requestBody);
    }

    public function deleteUserTodo(int $todoId)
    {
        return $this->_todoRepository->deleteUserTodo($todoId);
    }
}
