@extends('dashboard.base')

<title>Stock</title>

@section('content')
    <h4>Stock / Listes</h4>

    <a href="" class="btn btn-primary btn-sm" href="test">Ajouter</a>
    <br><br>

    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des entrées de stoc</h4>
                    </p>
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Article</th>
                                <th>Quantité</th>
                                <th>Direction</th>
                                <th>Date d'entrée</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mouvements_stock as $mouvement)
                                @if ($mouvement->type_mouvement === 'entrée')
                                    <tr>
                                        <td>{{ $mouvement->id }}</td>
                                        <td>{{ $mouvement->article->nom }}</td>
                                        <td>{{ $mouvement->quantité }}</td>
                                        <td>{{ $mouvement->direction->nom }}</td>
                                        <td>{{ $mouvement->date_mouvement->format('d/m/Y H:i') }}</td>
                                        <td>test</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

@endsection