@extends('dashboard.base')

<title>Directions</title>

@section('content')
    <h4>Directions / Add</h4>

    <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Ajouter un direction de services</h4>
                    <form class="form-sample" action="{{ route('directions.store') }}" method="POST">
                    @csrf

                    <label class="col-sm-3 col-form-label">Designation</label>
                      <input type="text" class="form-control" name="designations" placeholder="Ex: services informatiques"/><br><br>
                      <button type="submit" class="btn btn-primary me-2">Ajouter</button>
                    </form>
                  </div>
                </div>
              </div>

@endsection