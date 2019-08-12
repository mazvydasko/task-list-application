@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-4">
                <h3 class="page-title">Edit Status</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('status.update', $status->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Status name</label>
                        <input required type="text" name="name" class="form-control" value="{{$status->name}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
