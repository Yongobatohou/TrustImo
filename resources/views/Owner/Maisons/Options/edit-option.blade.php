@extends('layouts.auth')

@section('auth')

<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Mettre l'option à jour</h1>
    </div>
    <form class="row g-3" method="POST" action="{{route('update_option', ['id' => $option->id])}}">
        @method('PUT')
        @csrf

        <div class="form-group col-md-10">
            <label class="control-label" for="bedrooms">Nom</label>
            <input class="form-control" type="text" name="name" id="name" value="{{$option->name}}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-12 mt-2">
          <button type="submit" class="btn btn-light" style="background-color: #389d69;">Mettre à jour </button>
        </div>
    </form>
</div>

@endsection
