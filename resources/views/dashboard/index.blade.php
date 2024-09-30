@extends('dashboard.base')

<title>Dashboard</title>

@section('content')
<div class="row">
        <!-- Autres cartes ou widgets -->
        
        <!-- Carte pour le nombre total de conventions -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Conventions</h5>
                    <p class="card-text" style="font-size: 24px;">
                        {{ $totalConventions }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Materiel Globale</h5>
                    <p class="card-text" style="font-size: 24px;">
                        25
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Test</h5>
                    <p class="card-text" style="font-size: 24px;">
                        15
                    </p>
                </div>
            </div>
        </div>


@endsection