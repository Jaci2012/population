@extends('dashboard.base')

@section('content')
    <h4>Modifier la Convention</h4>

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Mettre à jour une Convention</h4>
                <form class="form-sample" action="{{ route('conventions.update', $convention->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Méthode PUT pour l'update -->

                    <p class="card-description">Convention info</p>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Numero</label>
                                <div class="col-sm-9">
                                    <input type="text" name="numero" value="{{ $convention->numero }}" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Objet</label>
                                <div class="col-sm-9">
                                    <input type="text" name="objet" value="{{ $convention->objet }}" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Exercice</label>
                                <div class="col-sm-9">
                                    <input type="text" name="exercice" value="{{ $convention->exercice }}" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fichier PDF</label>
                                <div class="col-sm-9">
                                    <!-- Champ pour uploader un nouveau fichier PDF -->
                                    <input type="file" name="img" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload PDF">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                    @if($convention->path)
                                        <a href="{{ asset('storage/' . $convention->path) }}" target="_blank">Voir PDF Actuel</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="card-description">Fournisseurs</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nom</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nom" value="{{ $convention->nom }}" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Adresse</label>
                                <div class="col-sm-9">
                                    <input type="text" name="adresse" value="{{ $convention->adresse }}" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Statistiques</label>
                                <div class="col-sm-9">
                                    <input type="text" name="statistiques" value="{{ $convention->statistiques }}" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fiscale</label>
                                <div class="col-sm-9">
                                    <input type="text" name="fiscale" value="{{ $convention->fiscale }}" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
@endsection
