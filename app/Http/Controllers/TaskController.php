<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/tasks",
     *     summary="Get list of all tasks",
     *     tags={"Tasks"},
     *
     *     @OA\Response(
     *         response=200,
     *         description="List of tasks",
     *
     *         @OA\JsonContent(
     *             type="array",
     *
     *             @OA\Items(
     *                 type="object",
     *
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="title", type="string", example="Sample Task"),
     *                 @OA\Property(property="description", type="string", example="This is a task description."),
     *                 @OA\Property(property="done", type="boolean", example=false),
     *                 @OA\Property(property="created_at", type="string", example="2024-01-01T00:00:00Z"),
     *                 @OA\Property(property="updated_at", type="string", example="2024-01-02T00:00:00Z")
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        return response()->json(Task::all());
    }

    /**
     * @OA\Post(
     *     path="/api/tasks",
     *     summary="Create a new task",
     *     tags={"Tasks"},
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(
     *             type="object",
     *
     *             @OA\Property(property="title", type="string", example="New Task"),
     *             @OA\Property(property="description", type="string", example="Task details"),
     *             @OA\Property(property="done", type="boolean", example=false)
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=201,
     *         description="Task created",
     *
     *         @OA\JsonContent(
     *             type="object",
     *
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="title", type="string", example="New Task"),
     *             @OA\Property(property="description", type="string", example="Task details"),
     *             @OA\Property(property="done", type="boolean", example=false),
     *             @OA\Property(property="created_at", type="string", example="2024-01-01T00:00:00Z"),
     *             @OA\Property(property="updated_at", type="string", example="2024-01-01T00:00:00Z")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $task = Task::create($request->all());

        return response()->json($task, 201);
    }

    /**
     * @OA\Delete(
     *     path="/api/tasks/{id}",
     *     summary="Delete a task",
     *     tags={"Tasks"},
     *
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the task to delete",
     *
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Task deleted successfully",
     *
     *         @OA\JsonContent(
     *             type="object",
     *
     *             @OA\Property(property="message", type="string", example="Task deleted")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=404,
     *         description="Task not found"
     *     )
     * )
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        if (! $task) {
            return response()->json(['message' => "Task with ID {$id} not found"], 404);
        }

        $task->delete();

        return response()->json(['message' => "Task with ID {$id} deleted successfully"], 200);
    }
}
