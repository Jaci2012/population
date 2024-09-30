@extends('dashboard.base')

<title>Directions</title>

@section('content')
    <h4>Directions / Listes</h4>

    <a href="{{ route('directions.add') }}" class="btn btn-primary btn-sm" href="test">Ajouter</a><br><br>

    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Listes des directions de services</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#ID</th>
                            <th>Designation</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($directions as $direction)
                          <tr>
                            <td class="py-1">{{ $direction->id }}</td>
                            <td>Directions de {{ $direction->designations }}</td>
                            <td>
                                <a href="{{ route('directions.edit', $direction->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('directions.destroy', $direction->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

@endsection