@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-4">
                <h3 class="page-title">Tasks</h3>
                <div class="panel-body">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                        <tr>
                            <th>Task</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($status->tasks as $task)
                            <tr>
                                <td><a href="{{route('tasks.show', $task->id)}}">{{$task->task_name}}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection