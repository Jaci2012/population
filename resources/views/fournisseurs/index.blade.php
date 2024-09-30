@extends('dashboard.base')

<title>Fournisseurs</title>

@section('content')
    <h4>Fournisseurs / Listes</h4>

    <a href="{{ route('fournisseurs.add') }}" class="btn btn-primary btn-sm" href="test">Ajouter</a><br><br>

    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Listes des catégories</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#ID</th>
                            <th>Nom du fournisseurs</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($fournisseurs as $fournisseur)
                          <tr>
                            <td class="py-1">{{ $fournisseur->id }}</td>
                            <td>{{ $fournisseur->name }}</td>
                            <td>
                                <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST" style="display:inline;">
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