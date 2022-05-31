<?php

namespace App\Repositories;

interface TodoStatusRepositoryInterface
{
    public function updateTodoStatus(int $todoId, array $statusArray);
}
