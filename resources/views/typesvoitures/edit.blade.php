@extends('dashboard.base')

<title>Types des Voitures</title>

@section('content')
    <h4>Types des Voitures / Edit</h4>

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modifier Les Types des Voitures</h4>
                <form action="{{ route('typesvoitures.update', $typesvoitures->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="col-sm-3 col-form-label">Types</label>
                    <input type="text" name="type" class="form-control" value="{{ $typesvoitures->type }}" required
                        placeholder="Ex: Modifier les types des Voitures" /><br><br>
                    <button type="submit" class="btn btn-primary me-2">Modifier</button>
                </form>
            </div>
        </div>
    </div>
@endsection
