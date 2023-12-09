@extends('admin.home')

@section('content')
<div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1>Projects: <a href=""></a></h1>
    @foreach ($projects as $project)
        <div class="card w-75 my-5 m-auto text-center box my-shadow">
            <div class="card-header">
              <h4><strong>Project title:</strong> {{ $project->title }}</h4>

            </div>
            <div class="card-body">
                @if ($project->type)
                    <h5 class="card-title">
                        <strong>Project type:</strong> {{ $project->type->name }}
                    </h5>
                @else
                    <p>Nessuna tecnologia utilizzata</p>
                @endif

                @if ($project->technologies)
                    <p><strong>Technologies:</strong></p>
                    <ul>
                        @foreach ($project->technologies as $technology)
                            <li>{{ $technology->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Nessuna tecnologia associata a questo progetto</p>
                @endif


                <p class="card-text"><strong>Project description:</strong> {{ $project->description }}</p>
                <form action={{route('admin.project.destroy', $project)}} method="post" onsubmit="return confirm('Are you sure you want to delete this project?')">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('admin.project.show', $project)}}" class="btn btn-primary">More info</a>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash fa-bounce"></i>
                    </button>
                </form>
            </div>
            <div class="card-footer text-muted">
                <strong><a href="{{ $project->website_url }}">See more on GitHub</a></strong>
            </div>
        </div>
    @endforeach
    <div class="m-3">
        {{ $projects->links() }}
    </div>
</div>

@endsection
