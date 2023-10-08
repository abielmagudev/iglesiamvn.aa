@extends('app')
@section('content')
@include('canciones.show.header', ['cancion' => $cancion])
<br>
<x-tabs class="is-centered is-medium">

	<li @class(['is-active' => $tab == 'cancion'])>
    	<a data-content="cancion">
    		<span class="icon">
    			<i class="fa-regular fa-file-audio"></i>
    		</span>
    		<span>Canción</span>
    	</a>
    </li>

    <li @class(['is-active' => $tab == 'interpretes'])>
    	<a data-content="interpretes">
    		<span class="icon">
    			<i class="fa-solid fa-microphone-lines"></i>
    		</span>
    		<span>Intérpretes</span>
    	</a>
    </li>

    <li @class(['is-active' => $tab == 'versiones'])>
    	<a data-content="versiones">
    		<span class="icon">
    			<i class="fa-solid fa-code-compare"></i>
    		</span>
    		<span>Versiones</span>
    	</a>
    </li>
    
</x-tabs>

<div class="tabs-content">
	@include('canciones.show.cancion-content', ['cancion' => $cancion])
	@include('canciones.show.interpretes-content', ['cancion' => $cancion])
	@include('canciones.show.versiones-content', ['cancion' => $cancion])
</div>
@endsection
