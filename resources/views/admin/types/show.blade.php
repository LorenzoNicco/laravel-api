@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <h1 class="text-center text-light my-5">Dettagli tipologia</h1>

            <div class="card">
                <div class="col-md-8">
                    <h1 class="mb-3">{{ $type->title }}</h1>
        
                    <h6 class="mb-3">{{ $type->slug }}</h6>

                    <h3 class="mb-3">Progetti associati: {{ $type->projects()->count() }}</h3>

                    @if ($type->projects()->count() > 0)
                        <ul>
                            @foreach ($type->projects as $project)
                                <li>
                                    <a href="{{ route('admin.projects.show', $project->id) }}">{{ $project->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h4>Nessun progetto associato</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection