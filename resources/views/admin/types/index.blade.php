@extends('admin.home')

@section('content')
<div></div>
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

    <h1>Types: <a href=""></a></h1>
    @foreach ($types as $type)
    <div class="card w-75 my-5 m-auto text-center box my-shadow">
        <div class="card-header">
          <h4><strong>{{ $type->name }}</strong></h4>
        </div>
        <div class="card-body">
            <h5 class="card-title"><strong>Type description:</strong></h5>
            <p class="card-text">{{ $type->description }}</p>
            <a href="{{route('admin.type.show', $type)}}" class="btn btn-primary">More info</a>
        </div>
      </div>
    @endforeach
    <div class="m-3">
        {{ $types->links() }}
    </div>
</div>

@endsection
