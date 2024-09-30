@extends('dashboard.base')

<title>Fournisseurs</title>

@section('content')
    <h4>Fournisseurs / Add</h4>

    <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Ajouter un fournisseur</h4>
                    <form class="form-sample" action="{{ route('fournisseurs.store') }}" method="POST">

                    @csrf
                    <label class="col-sm-3 col-form-label">Nom du fournisseurs</label>
                      <input type="text" name="name" class="form-control" placeholder="Ex: BAOMANITRA"/><br><br>
                      <button type="submit" class="btn btn-primary me-2">Ajouter</button>
                    </form>
                  </div>
                </div>
              </div>

@endsection