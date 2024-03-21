@extends('layouts/auth')


@section('auth')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajouter une nouvelle Caractéristiques</h1>
    </div>

    <form class="row g-3" method="POST" action="{{route('add_parcel_option')}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group col-md-10">
            <label class="control-label" for="name">Nom</label>
            <input class="form-control" type="text" name="name" id="name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-12 mt-2">
          <button type="submit" class="btn btn-light" style="background-color: #389d69;">Créer</button>
        </div>
      </form>

@endsection

