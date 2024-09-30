@extends('dashboard.base')
<title>Types de Voitures</title>

@section('content')
<h4>Types des Voitures / Listes</h4>

    <a href="{{route('typesvoitures.add')}}" class="btn btn-primary btn-sm">Ajouter</a>
    <br><br>


    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Listes des types Voitures</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#ID</th>
                            <th>Types</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($typesvoitures as $typevoiture)
                          <tr>
                            <td class="py-1">{{ $typevoiture->id }}</td>
                            <td>{{ $typevoiture->type }}</td>
                            <td>
                                <a href="{{ route('typesvoitures.edit', $typevoiture->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('typesvoitures.destroy', $typevoiture->id) }}" method="POST" style="display:inline;">
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
