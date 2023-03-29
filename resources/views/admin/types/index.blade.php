@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <h1 class="text-center text-light my-5">Lista tipologie di progetto</h1>

        <a href="{{ route('admin.types.create') }}" class="btn btn-success mb-3">Aggiungi una nuova tipologia</a>

        
        @include('partials.success')

        <ul>
            @foreach ($types as $type)
                <li class="text-light mb-2">
                    <span>Titolo: <strong>{{ $type->title }}</strong></span> - 

                    <span>Progetti associati: {{ $type->projects()->count() }}</span>
                    <a href="{{ route('admin.types.show', $type->id) }}" class="btn btn-primary mb-2">Dettagli</a>
                    <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning mb-2">Modifica</a>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $type->id }}">Elimina</button>

                    <div class="modal fade" id="deleteModal_{{ $type->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Elimminazione elemento</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-black">
                                Confermi di voler eliminare {{ $type->title }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">Elimina</button>
                                </form>
                            </div>
                          </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection