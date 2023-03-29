@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <h1 class="text-center text-light my-5">Dettagli progetto</h1>

        <div class="card">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $project->title }}</h1>
    
                <h6 class="mb-3">{{ $project->slug }}</h6>

                <h3 class="mb-3">Tipologia di progetto: 
                    @if ($project->type)
                        <a href="{{ route('admin.types.show', $project->type->id) }}">{{ $project->type->title }}</a>
                    @else
                        Non specificato.
                    @endif
                </h3>

                <h3 class="mb-3">Tecnologie utilizzate: 
                    @if ($project->technology)
                        <ul>
                            <li>
                                <a href="{{ route('admin.technologies.show', $project->technology->id) }}">{{ $project->technology->name }}</a>
                            </li>
                        </ul>
                    @else
                        Non specificato.
                    @endif
                </h3>

                @if ($project->img)
                    <img src="{{ asset('storage/'.$project->img) }}" class="card-img-top mb-3" alt="immagine" style="height: 200px; width: 300px">
                @endif
    
                <p>{{ $project->description }}</p>
            </div>
        </div>
    </div>
</div>
@endsection