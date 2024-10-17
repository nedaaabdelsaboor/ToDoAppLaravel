<?php
namespace App\Service;
use App\Repository\Interface\ITaskRepository;
class TaskService
{
    private $TaskRepository;
    public function __construct(ITaskRepository $TaskRepository){
        $this->TaskRepository=$TaskRepository;
    }

    public function index($userId){
        return $this->TaskRepository->index($userId);
    }
    public function all(){
        return $this->TaskRepository->all();
    }
    public function store($taskDTO){
        $this->TaskRepository->store($taskDTO);
    }
    public function filter($status){
        // dd($status->status);
        return $this->TaskRepository->filter($status);
    }
    public function update($id,$taskDTO){
        $this->TaskRepository->update($id,$taskDTO);
    }
    public function delete($id){
        $this->TaskRepository->delete($id);
    }
    public function find($id){
        return $this->TaskRepository->find($id);
    }
}