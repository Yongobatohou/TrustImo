@extends('layouts/auth')


@section('auth')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-center text-gray-800">Ajouter une nouvelle Parcelle</h1>
    </div>

    <form class="row g-3" method="POST" action="{{route('add_parcelle')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-3">
            <label class="control-label" for="name">Nom</label>
            <input class="form-control" type="text" name="name" id="name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label class="control-label" for="ville">Ville</label>
            <select class="form-control" name="ville" id="ville">
                <option value="">Dans quelle ville se trouve la parcelle??</option>
                <optgroup label="Atacora">
                    <option value="Natitingou">Natitingou</option>
                    <option value="Tanguiéta">Tanguiéta</option>
                    <option value="Matérie">Matérie</option>
                </optgroup>
                <optgroup label="Donga">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </optgroup>
                <optgroup label="Borgou">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </optgroup>
                <optgroup label="Alibori">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </optgroup>
            </select>
            @error('ville')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label class="control-label" for="quartier">Quartier</label>
            <select class="form-control" name="quartier" id="quartier">
                <option value="">Choisissez le quartier/village...</option>
                <option value="Winkè">Winkè</option>
                <option value="Boriyouré">Boriyouré</option>
                <option value="Kantaborifa">Kantaborifa</option>
                <option value="Yimporima">Yimporima</option>
                <option value="Ouroubouga">Ouroubouga</option>
                <option value="Santa">Santa</option>
            </select>
            @error('quartier')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-12">
          <label for="description" class="form-label">Description</label>
          <textarea cols="30" rows="5" class="form-control" id="description" name="description"></textarea>
          @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group col-md-3">
            <label class="control-label" for="surface">Surface</label>
            <input class="form-control" type="number" id="surface" name="surface">
            @error('surface')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label class="control-label" for="price">Prix</label>
            <input class="form-control" type="number" id="price" name="price">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label class="control-label" for="options">Caractéristiques</label>
            <select class="form-control" name="options[]" id="options" value="{{$Parcelle->house_options()->pluck('id')}}" multiple>
                @foreach ($options as $id => $value)
                    <option value="{{$id}}"> {{$value}} </option>
                @endforeach
            </select>
            @error('options')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-12 mt-2">
          <button type="submit" class="btn btn-light" style="background-color: #389d69;">Créer</button>
        </div>
      </form>

@endsection

