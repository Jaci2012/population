@extends('dashboard.base')

<title>Convention</title>

@section('content')
    <h4>Convention / Add</h4>

    <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Ajouter un convention</h4>
                    <form class="form-sample" action="{{ route('conventions.store') }}" method="POST" enctype="multipart/form-data">
                      
                    @csrf

                      <p class="card-description"> Convention info </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Numero</label>
                            <div class="col-sm-9">
                              <input type="text" name="numero" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Objet</label>
                            <div class="col-sm-9">
                              <input type="text" name="objet" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Exercice</label>
                                <div class="col-sm-9">
                                <input type="text" name="exercice" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Fichier</label>
                          <div class="col-sm-9">
                                <input type="file" name="pdf" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                                </div>
                          </div>
                        </div>
                      </div>
                    
                      <p class="card-description"> Fournisseurs </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nom</label>
                            <div class="col-sm-9">
                              <input type="text" name="nom" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Adresse</label>
                            <div class="col-sm-9">
                              <input type="text" name="adresse" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Statistiques</label>
                            <div class="col-sm-9">
                              <input type="text" name="statistiques" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fiscale</label>
                            <div class="col-sm-9">
                              <input type="text" name="fiscale" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <br><br>

                      <button type="submit" class="btn btn-primary me-2">Ajouter</button>
                    </form>
                  </div>
                </div>
              </div>

@endsection