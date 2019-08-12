@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h3 class="page-title">All Statuses</h3>
                @if(Auth::user())
                    <a href="{{route('status.create')}}">
                        <button type="button" class="btn btn-primary mb-5 mt-2">Create new status</button>
                    </a>
                @endif
                <div class="panel-body">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                        <tr>
                            <th>Status</th>
                            <th>More</th>
                            @if(Auth::user())
                                <th>Edit</th>
                                <th>Delete</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($statuses as $status)
                            <tr>
                                <td>{{$status->name}}</td>
                                <td>
                                    <a href="{{route('status.show', $status->id)}}"
                                       class="btn btn-xs btn-primary">View</a>
                                </td>
                                @if(Auth::user())
                                    <td>
                                        <a href="{{route('status.edit', $status->id)}}"
                                           class="btn btn-xs btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('status.destroy', $status->id)}}" method="post">
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