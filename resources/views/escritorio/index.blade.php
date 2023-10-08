@extends('app')
@section('content')

@include('escritorio.index.canciones', ['canciones' => $canciones])

@include('escritorio.index.tempo_autores', ['canciones' => $canciones])

@include('escritorio.index.cantantes', ['cantantes' => $cantantes, 'canciones' => $canciones])

@include('escritorio.index.etiquetas', ['etiquetas' => $etiquetas])

@push('scripts')
	@include('escritorio.index.js-estadisticas')
@endpush

@endsection
