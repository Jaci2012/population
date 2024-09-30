@extends('dashboard.base')

<title>Fournisseurs</title>

@section('content')
    <h4>Fournisseurs / Edit</h4>

    <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Modifier un fournisseur</h4>
                    <form class="form-sample" action="{{ route('fournisseurs.update', $fournisseur->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="col-sm-3 col-form-label">Nom du fournisseurs</label>
                      <input type="text" name="name" class="form-control" value="{{ $fournisseur->name }}" placeholder="Ex: BAOMANITRA"/><br><br>
                      <button type="submit" class="btn btn-primary me-2">Modifier</button>
                    </form>
                  </div>
                </div>
              </div>

@endsection