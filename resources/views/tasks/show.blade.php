@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h3 class="page-title"> {{$task->task_name}}</h3>
                <div class="panel-body">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                        <tr>
                            <th>Task</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Add date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$task->task_name}}</td>
                            <td>{{strip_tags($task->task_description)}}</td>
                            <td>{{$task->status->name}}
                                @if($task->completed_date)
                                    <br>
                                    {{$task->completed_date}}
                                @endif
                            </td>
                            <td>{{$task->created_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection