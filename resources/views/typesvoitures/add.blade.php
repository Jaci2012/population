@extends('dashboard.base')

<title>Types des Voitures</title>

@section('content')
    <h4>Types des Voitures / Add</h4>

    <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ajouter Les Types des Voitures</h4>
                    <form class="form-sample" action="{{ route('typesvoitures.store') }}" method="POST">
                        @csrf

                        <label class="col-sm-3 col-form-label">Types</label>
                        <input type="text" name="type" class="form-control" placeholder="Ex: Sprinter"/><br><br>
                        <button type="submit" class="btn btn-primary me-2">Ajouter</button>
                    </form>
            </div>
        </div>
    </div>

@endsection
