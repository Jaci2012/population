@extends('dashboard.base')

<title>Convention</title>

@section('content')
    <h4>Convention / Listes</h4>

    <a href="{{ route('conventions.add') }}" class="btn btn-primary btn-sm" href="test">Ajouter</a><br><br>

    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Listes des conventions</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Dates</th>
                            <th>Numero</th>
                            <th>Objet</th>
                            <th>Fournisseurs</th>
                            <th>Fichiers</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($conventions as $convention)
                          <tr>
                            <td class="py-1">{{ $convention->exercice }}</td>
                            <td><a href="{{ route('conventions.show', $convention->id) }}">{{ $convention->numero }}</a></td>
                            <td>{{ $convention->objet }}</td>
                            <td>{{ $convention->nom }}</td>
                            <td>
                        @if($convention->path)
                            <a href="{{ asset('storage/' . $convention->path) }}" target="_blank">Voir PDF</a>
                        @else
                            Pas de fichier
                        @endif
                    </td>
                    <td>
                    <a href="{{ route('conventions.edit', $convention->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                        <form action="{{ route('conventions.destroy', $convention->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
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