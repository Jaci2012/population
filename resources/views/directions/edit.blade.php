@extends('dashboard.base')

<title>Direction</title>

@section('content')
    <h4>Direction / Edit</h4>

    <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Modifier un direction</h4>
                    <form action="{{ route('directions.update', $direction->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="col-sm-3 col-form-label">Designation</label>
                      <input type="text" name="designations" class="form-control" value="{{ $direction->designations }}" required placeholder="Ex: Materiel Informatique"/><br><br>
                      <button type="submit" class="btn btn-primary me-2">Modifier</button>
                    </form>
                  </div>
                </div>
              </div>

@endsection