<?php
    namespace App\Repository\Interface;
    use App\DTO\TaskDTO;
    use Request;
    interface ITaskRepository 
    {
        public function index($userId);
        public function store(TaskDTO $taskDTO);
        public function update($id,Request $taskDTO);
        public function delete($id);
        public function find($id);
        public function all();
        public function filter( $status);
    }
?>