@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-4">
                <h3 class="page-title">Edit Task</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('tasks.update', $task->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Task status</label>
                        <select name="status" class="form-control">
                            @foreach($statuses as $status)
                                <option value="{{$status->id}}" {{($status->id == $task->status_id) ? 'selected' : ''}}>{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Task name</label>
                        <input required type="text" name="name" class="form-control" value="{{$task->task_name}}">
                    </div>
                    <div class="form-group">
                        <label>Task description</label>
                        <input required type="text" name="description" class="form-control"
                               value="{{$task->task_description}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
