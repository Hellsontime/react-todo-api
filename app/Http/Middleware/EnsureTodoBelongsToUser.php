<?php

namespace App\Http\Middleware;

use App\Services\TodoServiceInterface;
use Illuminate\Http\Request;
use Closure;

class EnsureTodoBelongsToUser
{
    private $_todoService;

    public function __construct(TodoServiceInterface $todoService) {
        $this->_todoService = $todoService;
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $requestParams = $request->route()->parameters;
        $userId = $request->user()['id'];

        if (array_key_exists('todoId', $requestParams)) {
            $todo = $this->_todoService->getUserTodoById($userId, $requestParams['todoId']);

            if (!count($todo))
            {
                return response()->json(['message' => 'Todo does not exist'], 404);
            }
        }

        return $next($request);
    }

}
