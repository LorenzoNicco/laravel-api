@extends('layouts.admin')

@section('content')
    <h1 class="text-center text-light my-5">Inserisci una nuova tipologia</h1>

    <form action="{{ route('admin.types.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title-input" class="form-label text-light">Titolo<span class="text-danger">*</span></label>
            <input required type="text" class="form-control" id="title-input" name="title" placeholder="Inserisci un titolo">
        </div>

        <div class="mb-3">
            <p class="text-light">
                I campi contrassegnati con <span class="text-danger">*</span> sono obbligatori
            </p>
        </div>

        <input type="submit" class="btn btn-primary">
    </form>
@endsection