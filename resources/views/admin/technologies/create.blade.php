@extends('layouts.admin')

@section('content')
    <h1 class="text-center text-light my-5">Inserisci una nuova tecnologia</h1>

    <form action="{{ route('admin.technologies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name-input" class="form-label text-light">Nome<span class="text-danger">*</span></label>
            <input required type="text" class="form-control" id="name-input" name="name" placeholder="Inserisci un nome">
        </div>

        <div class="mb-3">
            <p class="text-light">
                I campi contrassegnati con <span class="text-danger">*</span> sono obbligatori
            </p>
        </div>

        <input type="submit" class="btn btn-primary">
    </form>
@endsection