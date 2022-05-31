<?php

namespace App\Services;

use App\Repositories\TodoStatusRepositoryInterface;

class TodoStatusService implements TodoStatusServiceInterface
{
    private TodoStatusRepositoryInterface $_todoStatusRepository;

    public function __construct(TodoStatusRepositoryInterface $todoStatusRepository)
    {
        $this->_todoStatusRepository = $todoStatusRepository;
    }

    public function updateTodoStatus(int $todoId, int $status)
    {
        if (!in_array($status, [0,1]))
            return response(['message' => 'Incorrect status value'], 403);

        $statusArray = ["status" => $status];

        return $this->_todoStatusRepository->updateTodoStatus($todoId, $statusArray);
    }
}
