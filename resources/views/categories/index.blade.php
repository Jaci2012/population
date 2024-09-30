@extends('dashboard.base')

<title>Catégorie</title>

@section('content')
    <h4>Catégorie / Listes</h4>

    <a href="{{ route('categories.add') }}" class="btn btn-primary btn-sm" href="test">Ajouter</a>
    <br><br>


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
                            <th>Designation</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                          <tr>
                            <td class="py-1">{{ $category->id }}</td>
                            <td>{{ $category->designation }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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