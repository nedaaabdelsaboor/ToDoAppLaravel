@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
                <div class="card rounded-3">
                    <div class="card-body p-4">

                        <h4 class="text-center my-3 pb-3">To Do App</h4>

                        <table class="table mb-4">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Todo item</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                    <!-- <th scope="col">
                                    </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <form action="{{route('add',['id'=>$task->id])}}" >
                                    @csrf
                                        <tr>
                                            <th scope="row">{{$task->id}}</th>
                                            <td>{{$task->task}}</td>
                                            <td>
                                                <div class="row">
                                                        <div class="input-group">
                                                            <select name="status" class="form-select"
                                                                aria-label="Default select example">
                                                                <option value="waiting" {{ $task->status == 'waiting' ? 'selected' : '' }}>Waiting</option>
                                                                <option value="active" {{ $task->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                <option value="rejected" {{ $task->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{route('add',['id'=>$task->id])}}" role="button" type="submit"
                                                    class="btn btn-danger">Add</a>
    
                                            </td>
                                        </tr>
                                    </form>
                                    @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection