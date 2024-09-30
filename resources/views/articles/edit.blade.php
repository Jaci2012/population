@extends('dashboard.base')

<title>Article</title>

@section('content')
    <h4>Article / Edit</h4>

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modifier un article</h4>
                <form action="{{ route('articles.update', $articles->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="col-sm-3 col-form-label">Designation</label>
                    <input type="text" name="design" class="form-control" value="{{ $articles->design }}" required >
                    <br><br>
                    <button type="submit" class="btn btn-primary me-2">Modifier</button>
                </form>
            </div>
        </div>
    </div>
@endsection

