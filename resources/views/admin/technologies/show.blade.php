@extends('admin.home')

@section('content')
    <div class="d-flex flex-column justify-content-between h-100 ">
        <div class="h-100 ">
            <h1 class="d-flex justify-content-evenly my-2">
                <strong>Technology n°:{{$technology->id}}</strong>
                <form action={{route('admin.technology.destroy', $technology)}} method="post" onsubmit="return confirm('Are you sure you want to delete this project?')">
                    <button class="btn btn-warning">
                        <a class="nav-link"  href="{{route('admin.technology.edit', $technology->id)}}">Edit Technology</a>
                    </button>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Delete Technology
                    </button>
                </form>
            </h1>
            <h2 class="text-center">
                <strong>Technology name:</strong>
                {{$technology->name}}
            </h2>
            <div>
                <h3>Description:</h3>
                <p>{{$technology->description}}</p>
            </div>
            @include('partials.btn_next_prev')
        </div>
        <div class="bg-secondary text-center">Creation date: {{$technology->start_date}}</div>
    </div>
@endsection
