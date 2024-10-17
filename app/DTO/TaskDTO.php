<?php
namespace App\DTO;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\UpdatedTaskRequest;
use Auth;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
Class TaskDTO extends Data
{

    public function __construct(
        public string $task,
        public string $status,
        public ?int $userId = null 
    ) {
        $this->userId = $this->userId ?? Auth::id();
    }
    
    public static function handleInputs(Request $request)
    {
        $data = [
            'task'=>$request->task,
            'status' => $request->status,
            'userId'=>Auth::id()
        ];
    }

}
