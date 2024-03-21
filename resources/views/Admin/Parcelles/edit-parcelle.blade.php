@extends('layouts.auth')

@section('auth')

<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Mettre à les informations de la parcelle</h1>
    </div>
    <form class="row g-3" method="POST" action="{{route('update_parcelle', ['id' => $Parcelle->id])}}">
        @method('PUT')
        @csrf
        <div class="form-group col-md-3">
            <label class="control-label" for="name">Nom</label>
            <input class="form-control" type="text" name="name" id="name" value="{{$Parcelle->nom}}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label class="control-label" for="ville">Ville</label>
            <select class="form-control" name="ville" id="ville">
                <option value="{{$Parcelle->ville}}" selected>{{$Parcelle->ville}}</option>
                <optgroup label="Atacora">
                    <option value="Atacora/Natitingou">Natitingou</option>
                    <option value="Atacora/Tanguiéta">Tanguiéta</option>
                    <option value="Atacora/Matérie">Matérie</option>
                </optgroup>
                <optgroup label="Donga">
                    <option value="Donga/"></option>
                    <option value="Donga/"></option>
                    <option value="Donga/"></option>
                </optgroup>
                <optgroup label="Borgou">
                    <option value="Borgou/"></option>
                    <option value="Borgou/"></option>
                    <option value="Borgou/"></option>
                </optgroup>
                <optgroup label="Alibori">
                    <option value="Alibori/"></option>
                    <option value="Alibori/"></option>
                    <option value="Alibori/"></option>
                </optgroup>
            </select>
            @error('ville')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label class="control-label" for="quartier">Quartier</label>
            <select class="form-control" name="quartier" id="quartier">
                <option value="{{$Parcelle->quartier}}" selected>{{$Parcelle->quartier}}</option>
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
          <textarea cols="30" rows="5" class="form-control" id="description" name="description"> {{$Parcelle->description}} </textarea>
          @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group col-md-3">
            <label class="control-label" for="surface">Surface</label>
            <input class="form-control" type="number" id="surface" name="surface" value="{{$Parcelle->surface}}">
            @error('surface')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label class="control-label" for="price">Prix</label>
            <input class="form-control" type="number" id="price" name="price" value="{{$Parcelle->price}}">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label class="control-label" for="avance">Caractéristiques</label>
            <select class="form-control" name="options[]" id="options" multiple>
                @foreach ($options as $id => $value)
                    <option value="{{$id}}" @selected($val->contains($id))> {{$value}} </option>
                @endforeach
            </select>
            @error('options')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-light" style="background-color: #389d69;">Mettre à jour </button>
        </div>
    </form>
</div>

@endsection
