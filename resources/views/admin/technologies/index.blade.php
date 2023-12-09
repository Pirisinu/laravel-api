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

    <h1>Technologies: <a href=""></a></h1>
    @foreach ($technologies as $technology)
    <div class="card w-75 my-5 m-auto text-center box my-shadow">
        <div class="card-header">
          <h4><strong>{{ $technology->name }}</strong></h4>
        </div>
        <div class="card-body">
          <h5 class="card-title"><strong>Technology description:</strong></h5>
          <p class="card-text">{{ $technology->description }}</p>
          <a href="{{route('admin.technology.show', $technology)}}" class="btn btn-primary">More info</a>
        </div>
      </div>
    @endforeach
    <div class="m-3">
        {{ $technologies->links() }}
    </div>
</div>

@endsection
