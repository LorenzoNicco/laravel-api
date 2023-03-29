@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <h1 class="text-center text-light my-5">Lista tecnologie usate</h1>

        <a href="{{ route('admin.technologies.create') }}" class="btn btn-success mb-3">Aggiungi una nuova tecnologia</a>

        
        @include('partials.success')

        <ul>
            @foreach ($technologies as $technology)
                <li class="text-light mb-2">
                    <span>Nome: <strong>{{ $technology->name }}</strong></span> - 

                    <span>Progetti associati: {{ $technology->projects()->count() }}</span>
                    <a href="{{ route('admin.technologies.show', $technology->id) }}" class="btn btn-primary mb-2">Dettagli</a>
                    <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-warning mb-2">Modifica</a>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $technology->id }}">Elimina</button>

                    <div class="modal fade" id="deleteModal_{{ $technology->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Elimminazione elemento</h1>
                              <button technology="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-black">
                                Confermi di voler eliminare {{ $technology->name }}?
                            </div>
                            <div class="modal-footer">
                                <button technology="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST" data-bs-toggle="modal" data-bs-target="#exampleModal">
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