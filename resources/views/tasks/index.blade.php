@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h3 class="page-title">All Tasks</h3>
                @if(Auth::user())
                    <a href="{{route('tasks.create')}}">
                        <button type="button" class="btn btn-primary mb-5 mt-2">Create new task</button>
                    </a>
                @endif
                <div>
                    <a href="{{route('tasks.index')}}">
                        <button type="button" class="btn btn-dark mb-5 mt-2">All</button>
                    </a>
                    @foreach($statuses as $status)
                        <a href="?status={{$status->name}}">
                            <button type="button" class="btn btn-dark mb-5 mt-2">{{$status->name}}</button>
                        </a>
                    @endforeach
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                        <tr>
                            <th>Task</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Add date</th>
                            <th>More</th>
                            @if(Auth::user())
                                <th>Edit</th>
                                <th>Delete</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->task_name}}</td>
                                <td>{!! $task->task_description !!}</td>
                                <td>
                                    @if($task->status)
                                        {{$task->status->name}}
                                    @endif
                                    @if($task->completed_date)
                                        <br>
                                        {{$task->completed_date}}
                                    @endif
                                </td>
                                <td>{{$task->created_at}}</td>
                                <td>
                                    <a href="{{route('tasks.show', $task->id)}}"
                                       class="btn btn-xs btn-primary">View</a>
                                </td>
                                @if(Auth::user())
                                    <td>
                                        <a href="{{route('tasks.edit', $task->id)}}"
                                           class="btn btn-xs btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('tasks.destroy', $task->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class=" mt-2 btn btn-xs btn-danger">
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection