@extends('admin.home')

@section('content')
    <div class="container">
        <h1>Edit Project</h1>

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

        <form action="{{route('admin.project.update', $projectToEdit->id)}}" method="POST" class="row g-3 p-3">
            @csrf
            @method('PUT')
            {{-- NAME --}}
            <div class="col-md-4">
                <label for="title" class="form-label">Name:</label>
                <input type="text" placeholder="Project name" class="form-control" name="title" id="title" value="{{ old('title', $projectToEdit->title) }}">
                @error('title')
                    <div class="alert alert-danger my-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- TYPES --}}
            <div class="col-md-4">
                <label for="type_id" class="form-label">Type</label>
                <select name="type_id" class="form-select" id="type_id">
                    <option value="">Selezionare una genere</option>
                    @foreach ($types as $type)
                        <option
                            value="{{ $type->id }}"
                            {{ old('type_id', $projectToEdit->type->id) == $type->id
                                    ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            {{-- DATE --}}
            <div class="col-md-4">
              <label for="start_date" class="form-label">Project start date:</label>
              <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date', $projectToEdit->start_date) }}">
            </div>

            {{-- TECHNOLOGIES --}}
            <div class="mb-3">
                <p>Technologies:</p>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    @foreach ($technologies as $technology )
                        <input
                        id="technology_{{ $technology->id }}"
                        class="btn-check"
                        autocomplete="off"
                        type="checkbox"
                        name="technologies[]"
                        value="{{ $technology->id }}"
                        {{ in_array($technology->id, old('technologies', $projectToEdit->technologies->pluck('id')->toArray())) ? 'checked' : '' }}
                        >
                        <label class="btn btn-outline-primary" for="technology_{{ $technology->id }}">{{ $technology->name }}</label>
                    @endforeach
                    @error('technologies')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            {{-- DESCRIPTION --}}
            <div class="mb-3">
                <label for="description"  class="form-label">Description:</label>
                <textarea class="form-control" name="description" placeholder="Insert description" id="description" rows="3">{{ old('description', $projectToEdit->description) }}</textarea>
            </div>
            {{-- BTN --}}
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save new project</button>
                <button type="reset" class="btn btn-warning">Annulla</button>
                <button class="btn btn-danger"><a class="text-decoration-none text-black" href="{{route('admin.project.show', $projectToEdit)}}">Exit</a></button>
            </div>
          </form>
    </div>
@endsection
