<?php

namespace App\Services;

interface TodoStatusServiceInterface
{
    public function updateTodoStatus(int $todoId, int $status);
}
