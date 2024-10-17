<?php

namespace App\Http\Controllers;

use App\DTO\TaskDTO;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TasksResource;
use App\Service\TaskService;
use Illuminate\Http\Request;

class TasksapiContoller extends Controller
{
    protected $Taskservice;
    public function __construct(TaskService $taskservice)
    {
        $this->Taskservice= $taskservice;
    }
    public function all()
    {
        $tasks = $this->Taskservice->all();
        return TasksResource::collection($tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TaskRequest $taskRequest)
    {
        $this->Taskservice->store(TaskDTO::from($taskRequest));
        return response()->json([
            'message'=>'The task has been added successfully'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function filter(Request $request)
    {
        if ($request->status == 'all') {
            $tasks = $this->Taskservice->index($request->userId);
            return TasksResource::collection($tasks);
        } else {
            $tasks = $this->Taskservice->filter($request->status);
            return TasksResource::collection($tasks);
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, request $taskRequest)
    {
        // dd(TaskDTO::from($taskRequest));
        $this->Taskservice->update($id, $taskRequest->status);
        return response()->json([
            'message'=>'The task has been updated successfully'
        ]);;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->Taskservice->delete($id);
        return response()->json([
            'message'=>'The task has been deleted successfully'
        ]);
    }
}
