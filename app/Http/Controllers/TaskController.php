<?php

namespace App\Http\Controllers;

use App\DTO\TaskDTO;
use App\Http\Requests\StatusRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\UpdatedTaskRequest;
use App\Service\TaskService;
use App\Service\UserService;
use Illuminate\Http\Request;
use Auth;
use Redirect;
class TaskController extends Controller
{
    private $TaskService;
    private $userId;
    public function __construct(TaskService $TaskService)
    {
        $this->TaskService = $TaskService;
        $this->middleware('auth');
    }

    public function index()
    {
        $this->userId = Auth::id();

        $tasks = $this->TaskService->index($this->userId);
        return view('home', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function filter(Request $request)
    {
        $this->userId = Auth::id();
        if ($request->status == 'all') {
            $tasks = $this->TaskService->index($this->userId);
            return view('home', [
                'tasks' => $tasks
            ]);
        } else {
            $tasks = $this->TaskService->filter($request->status);
            return view('home', [
                'tasks' => $tasks
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add_task(TaskRequest $taskRequest)
    {
        $this->TaskService->store(TaskDTO::from($taskRequest));
        return redirect()->back();
    }
    public function add($id)
    {
        // dd($this->TaskService->find($id));
        $this->TaskService->store(TaskDTO::from($this->TaskService->find($id)));
        return redirect()->route('main');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $this->userId=Auth::id();
        $tasks = $this->TaskService->all();
        return view('tasks', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(string $id, request $taskRequest)
    {
        // dd(TaskDTO::from($taskRequest));
        $this->TaskService->update($id, $taskRequest->status);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->TaskService->delete($id);
        return redirect()->back();
    }
}
