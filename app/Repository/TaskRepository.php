<?php
    namespace App\Repository;
    use App\DTO\TaskDTO;
    use App\Models\Tasks;
    use App\Repository\Interface\ITaskRepository;
    use Auth;
    class TaskRepository implements ITaskRepository
    {
        public function index($userId){
            $tasks=Tasks::where('userId',$userId)->get();
            return $tasks;
        }

        public function all(){
            return Tasks::all();
        }
        public function store($taskDTO){
            Tasks::create($taskDTO->toArray());
            return redirect()->back();
        }
        public function update($id,$taskRequest){
            $task= Tasks::findOrFail($id);
            $task->update(['status'=>$taskRequest]);
            return redirect()->back();
        }
        
        public function delete($id){
            $task= Tasks::findOrFail($id);
            $task->delete();
        }
        public function find($id){
            return $task= Tasks::findOrFail($id);
        }
        public function filter($status){
            // dd($request->status);
            $tasks= Tasks::where('status', $status)->get();
            return $tasks;
        }
    }