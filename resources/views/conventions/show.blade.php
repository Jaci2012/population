@extends('dashboard.base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h4>Détails de la Convention</h4>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Convention: {{ $convention->numero }}</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">Objet</h6>
                                    <p class="card-text">{{ $convention->objet }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">Exercice</h6>
                                    <p class="card-text">{{ $convention->exercice }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">Nom</h6>
                                    <p class="card-text">{{ $convention->nom }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">Adresse</h6>
                                    <p class="card-text">{{ $convention->adresse }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">Fiscale</h6>
                                    <p class="card-text">{{ $convention->fiscale }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">Statistiques</h6>
                                    <p class="card-text">{{ $convention->statistiques }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">PDF Fichier</h6>
                                    @if($convention->path)
                                        <a href="{{ asset('storage/' . $convention->path) }}" target="_blank" class="btn btn-primary">Voir le PDF</a>
                                    @else
                                        <p class="card-text">Aucun fichier PDF disponible.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('conventions.edit', $convention->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('conventions.destroy', $convention->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette convention ?');">Supprimer</button>
                        </form>
                        <a href="{{ route('conventions.index') }}" class="btn btn-secondary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
