@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-4">
                <h3 class="page-title">Create Task</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('tasks.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Task status</label>
                        <select name="status" class="form-control">
                            @foreach($statuses as $status)
                                <option selected value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Task name</label>
                        <input required type="text" name="name" class="form-control"
                               value="{{ old('name') }}" placeholder="Enter task name">
                    </div>
                    <div class="form-group">
                        <label>Task description</label>
                        <textarea class="description" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea.description',
            width: 900,
            height: 300
        });
    </script>
@endsection