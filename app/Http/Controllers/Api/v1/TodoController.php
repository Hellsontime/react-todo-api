<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\BaseApiV1Controller;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Services\TodoServiceInterface;
use Illuminate\Http\Request;

class TodoController extends BaseApiV1Controller
{
    private TodoServiceInterface $_todoService;

    public function __construct(TodoServiceInterface $todoService)
    {
        $this->_todoService = $todoService;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $userId = $request->user()['id'];

        return $this->_todoService->getUserTodos($userId);
    }

    /**
     * @param StoreTodoRequest $request
     * @return mixed
     */
    public function store(StoreTodoRequest $request)
    {
        $userId = $request->user()['id'];
        $requestBody = $request->all();

        return $this->_todoService->createUserTodo($userId, $requestBody);
    }

    /**
     * @param Request $request
     * @param int $todoId
     * @return mixed
     */
    public function show(Request $request, int $todoId)
    {
        $userId = $request->user()['id'];

        return $this->_todoService->getUserTodoById($userId, $todoId);
    }

    /**
     * @param UpdateTodoRequest $request
     * @param int $todoId
     * @return mixed
     */
    public function update(UpdateTodoRequest $request, int $todoId)
    {
        $userId = $request->user()['id'];
        $requestBody = $request->all();

        return $this->_todoService->updateUserTodo($userId, $todoId, $requestBody);
    }

    /**
     * @param Request $request
     * @param int $todoId
     * @return mixed
     */
    public function destroy(int $todoId)
    {
        return $this->_todoService->deleteUserTodo($todoId);
    }
}
