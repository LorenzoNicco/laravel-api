@extends('layouts.admin')

@section('content')
@include('partials.success')

<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <h1 class="text-center text-light my-5">Lista progetti</h1>

        <div class="col-md-8">
            <div class="row g-3 justify-content-between">
                @foreach ($projects as $project)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h6>{{ $project->slug }}</h6>
                            </li>
                            <li class="list-group-item">
                                <p class="card-text">{{ $project->description }}</p>
                            </li>
                            <li class="list-group-item">
                                <p class="mb-3">Tipologia di progetto: 
                                    @if ($project->type)
                                        <a href="{{ route('admin.types.show', $project->type->id) }}">{{ $project->type->title }}</a>
                                    @else
                                        Non specificato.
                                    @endif
                                </p>
                            </li>
                            <li class="list-group-item">
                                {{ $project->id }}
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary mb-2">Dettagli</a>
                                
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning mb-2">Modifica</a>
                                
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $project->id }}">Elimina</button>

                                {{-- eliminazione tramite onclick --}}
                                {{-- <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">Elimina</button>
                                </form> --}}

                                {{-- eliminazione tramite modale --}}
                                <div class="modal fade" id="deleteModal_{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Elimminazione elemento</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Confermi di voler eliminare {{ $project->title }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                @csrf
                                                @method('DELETE')
            
                                                <button class="btn btn-danger">Elimina</button>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>
@endsection