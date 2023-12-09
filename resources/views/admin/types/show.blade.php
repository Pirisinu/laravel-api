@extends('admin.home')

@section('content')
    <div class="d-flex flex-column justify-content-between h-100 ">
        <div class="h-100 ">
            <h1 class="d-flex justify-content-evenly my-2">
                <strong>Type n°:{{$type->id}}</strong>
                <form action={{route('admin.type.destroy', $type)}} method="post" onsubmit="return confirm('Are you sure you want to delete this type?')">
                    <button class="btn btn-warning">
                        <a class="nav-link"  href="{{route('admin.type.edit', $type->id)}}">Edit Type</a>
                    </button>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Delete Type
                    </button>
                </form>
            </h1>
            <h2 class="text-center">
                <strong>Type name:</strong>
                {{$type->name}}
            </h2>
            <div>
                <h3>Description:</h3>
                <p>{{$type->description}}</p>
            </div>
            @include('partials.btn_next_prev')
        </div>
        <div class="bg-secondary text-center">Creation date: {{$type->start_date}}</div>
    </div>
@endsection
