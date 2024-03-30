@extends('layouts.auth')

@section('auth')

<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Mettre à les informations de la propriété</h1>
    </div>
    <form class="row g-3" method="POST" action="{{route('edit_house', ['id' => $house->id])}}">
        @method('PUT')
        @csrf
        <div class="form-group col-md-3">
            <label class="control-label" for="name">Nom</label>
            <select class="form-control" name="name" id="name">
                <option value="{{$house->name}}" selected>{{$house->name}}</option>
                <option value="Entré-Couché">Entré-Couché</option>
                <option value="Chambre-salon">Chambre(s)-Salon</option>
                <option value="Villa">Villa</option>
                <option value="Boutique">Boutique</option>
                <option value="Maison">Maison individuelle</option>
            </select>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label class="control-label" for="type">Type d'annonce</label>
            <select class="form-control" name="type" id="type">
                <option value="{{$house->type}}" selected>{{$house->type}}</option>
                <option value="Location">Location</option>
                <option value="Vente">Vente</option>
            </select>
            @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label class="control-label" for="ville">Ville</label>
            <select class="form-control" name="ville" id="ville">
                <option value="{{$house->ville}}">{{$house->ville}}</option>
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
                <option value="{{$house->quartier}}">{{$house->quartier}}</option>
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
          <textarea cols="30" rows="5" class="form-control" id="description" name="description">{{$house->description}}</textarea>
          @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group col-md-2">
            <label class="control-label" for="surface">Surface</label>
            <input class="form-control" type="number" id="surface" name="surface" value="{{$house->surface}}">
            @error('surface')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-2">
            <label class="control-label" for="rooms">Nbr de pièces</label>
            <input class="form-control" type="number" name="rooms" id="rooms" value="{{$house->rooms}}">
            @error('rooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-2">
            <label class="control-label" for="bedrooms">Nbr de Chambres</label>
            <input class="form-control" type="text" name="bedrooms" id="bedrooms" value="{{$house->bedrooms}}">
            @error('bedrooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label class="control-label" for="loyé">Prix</label>
            <input class="form-control" type="text" name="loyé" id="loyé" value="{{$house->loyé}}">
            @error('loyé')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label class="control-label" for="avance">Nombre de mois d'avance</label>
            <input class="form-control" type="number" name="avance" id="avance" value="{{$house->avance}}">
            @error('avance')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-12">
            <label class="control-label" for="avance">Caractéristiques</label>
            <select class="form-control" name="options[]" id="options" multiple>
                @foreach ($options as $id => $value)
                    <option  value="{{$id}}" @selected($val->contains($id))> {{$value}} </option>
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
