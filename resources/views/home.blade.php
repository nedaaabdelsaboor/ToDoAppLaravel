@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
                <div class="card rounded-3">
                    <div class="card-body p-4">

                        <h4 class="text-center my-3 pb-3">To Do App</h4>

                        <form action="{{route('add_task')}}"
                            class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2"
                            method="POST">
                            @csrf
                            <div class=" mb-4">
                                <div data-mdb-input-init class="form-outline ">
                                    <input type="text" id="form1" class="form-control " placeholder="Enter a task here"
                                        name="task" />
                                </div>
                            </div>
                            <div class="mb-4">
                                <select name="status" class="form-select" aria-label="Default select example">
                                    <option value="waiting" selected>Waiting</option>
                                    <option value="active">Active</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>
                            <!-- <div class="row col-12  justify-content-around">
                                    </div> -->
                            <div class="mb-4">
                                <button role="submit" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary">Add</button>
                            </div>
                            <div class="mb-4">
                                <a type=""href="{{route('show')}}" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning">Get
                                    tasks</a>
                            </div>
                        </form>
                        <form class="input-group mb-4 d-flex justify-content-end" method="post"action="{{route('filter')}}">
                        @csrf
                            <div class="mt-2 me-3">
                                <label for="select" class="form-label">Filter By: </label>
                            </div>
                            <div class="mb-4">
                                <select name="status" id="select" class="form-select"
                                    aria-label="Default select example">
                                    <option value="all"selected>All</option>
                                    <option value="waiting">Waiting</option>
                                    <option value="active">Active</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <button href="{{route('filter')}}" role="button" type="submit" class="btn btn-success ms-1">Filter</button>
                            </div>
                        </form>

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
                                    <tr>
                                        <th scope="row">{{$task->id}}</th>
                                        <td>{{$task->task}}</td>
                                        <td>
                                            <div class="row">

                                                <form action="{{ route('update', ['id' => $task->id]) }}" method="post">
                                                    @csrf
                                                    <div class="input-group">
                                                        <select name="status" class="form-select"
                                                            aria-label="Default select example">
                                                            <option value="waiting" {{ $task->status == 'waiting' ? 'selected' : '' }}>Waiting</option>
                                                            <option value="active" {{ $task->status == 'active' ? 'selected' : '' }}>Active</option>
                                                            <option value="rejected" {{ $task->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                        </select>
                                                        <button href="{{route('update', ['id' => $task->id])}}"
                                                            role="button" type="submit"
                                                            class="btn btn-success ms-1">update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{route('destroy', ['id' => $task->id])}}" role="button"
                                                class="btn btn-danger">Delete</a>

                                        </td>
                                    </tr>
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