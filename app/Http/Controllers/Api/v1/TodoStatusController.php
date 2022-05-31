<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\BaseApiV1Controller;
use App\Http\Requests\UpdateTodoStatusRequest;
use App\Services\TodoStatusServiceInterface;

class TodoStatusController extends BaseApiV1Controller
{
    private TodoStatusServiceInterface $_todoStatusService;

    public function __construct(TodoStatusServiceInterface $todoStatusService)
    {
        $this->_todoStatusService = $todoStatusService;
    }

    /**
     * @param UpdateTodoStatusRequest $request
     * @param int $todoId
     * @return mixed
     */
    public function update(UpdateTodoStatusRequest $request, int $todoId)
    {
        $status = $request->all()['status'];

        return $this->_todoStatusService->updateTodoStatus($todoId, $status);
    }
}
