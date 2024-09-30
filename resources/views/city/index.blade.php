@extends('dashboard.base')

<title>Villes</title>

@section('content')
    <h4>Villes / Listes</h4>

    <a href="{{ route('cities.add') }}" class="btn btn-primary btn-sm" href="test">Ajouter</a>
    <br><br>


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Listes des villes</h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Nom de la ville</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <td class="py-1">{{ $city->id }}</td>
                                    <td>{{ $city->name }} ({{ $city->cp }})</td>
                                    <td>
                                        <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                        <form action="{{ route('cities.destroy', $city->id) }}" method="POST" style="display:inline;">
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
