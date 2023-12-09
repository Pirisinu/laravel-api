@extends('admin.home')

@section('content')
    <div class="container">
        <h1>Edit Type</h1>

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

        <form action="{{route('admin.type.update', $typeToEdit->id)}}" method="POST" class="row g-3 p-3">
            @csrf
            @method('PUT')
            {{-- NAME --}}
            <div class="col-md-6">
              <label for="name" class="form-label">Name:</label>
              <input type="text" placeholder="Type name" class="form-control" name="name" id="name" value="{{ old('name', $typeToEdit->name) }}">
            </div>
            {{-- DESCRIPTION --}}
            <div class="mb-3">
                <label for="description"  class="form-label">Description:</label>
                <textarea class="form-control" name="description" placeholder="Insert description" id="description" rows="3">{{ old('description', $typeToEdit->description) }}</textarea>
            </div>
            {{-- BTN --}}
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save new project</button>
                <button type="reset" class="btn btn-warning">Annulla</button>
                <button class="btn btn-danger"><a class="text-decoration-none text-black" href="{{route('admin.type.show', $typeToEdit)}}">Exit</a></button>
            </div>
          </form>
    </div>
@endsection
