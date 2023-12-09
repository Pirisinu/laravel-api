@extends('admin.home')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
    <div class="d-flex flex-column justify-content-between h-100 ">
        <div class="h-100 ">
            <h1 class="d-flex justify-content-evenly my-2">
                <strong>Project n°:{{$project->id}}</strong>
                <form action={{route('admin.project.destroy', $project)}} method="post" onsubmit="return confirm('Are you sure you want to delete this project?')">
                    <button class="btn btn-warning">
                        <a class="nav-link btn btn-warning" href="{{route('admin.project.edit', $project->id)}}"><i class="fa-sharp fa-solid fa-pen fa-bounce"></i></a>
                    </button>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash fa-bounce"></i>
                    </button>
                </form>
            </h1>
            <h2 class="text-center">
                <strong>Project name:</strong>
                {{$project->title}}
            </h2>

            <div>
                <h2>
                    <strong>Technologies:</strong>
                </h2>
                <ul>
                    @if ($project->technologies->count())
                        @foreach ($project->technologies as $technology)
                            @if ($technology->name)
                                <li>{{ $technology->name }}</li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <p>No one technology associated</p>
                @endif
                </ul>



                <h2>
                    <strong>Type:</strong>
                </h2>
                <p>{{$project->type->name}}</p>
                <h3><strong>Description:</strong></h3>
                <p>{{$project->description}}</p>
            </div>
            @include('partials.btn_next_prev')
        </div>
        <div class="bg-secondary text-center">Creation date: {{$project->start_date}}</div>
    </div>
@endsection
