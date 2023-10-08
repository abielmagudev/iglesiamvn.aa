<div class="box">
	<nav class="level">
	  <div class="level-item has-text-centered">
	    <div>
	      <p class="heading">Etiquetas</p>
	      <p class="title">{{ $etiquetas->count() }}</p>
	    </div>
	  </div>
	  <div class="level-item has-text-centered">
	    <div>
	      <p class="heading">
	        <span>Más utilizada:</span>
	      	<span class="has-text-weight-bold">"{{ $etiquetas->count() ? $etiquetas->first()->nombre : '?' }}"</span>
	  	  </p>
	      <p class="title">{{ $etiquetas->count() ? $etiquetas->first()->canciones_count : 0 }}</p>
	    </div>
	  </div>
	  <div class="level-item has-text-centered">
	    <div>
	      <p class="heading">
	      	<span>Menos utilizada</span>
			<span class="has-text-weight-bold">"{{ $etiquetas->count() ? $etiquetas->last()->nombre : '?' }}"</span>
	      </p>
	      <p class="title">{{ $etiquetas->count() ? $etiquetas->last()->canciones_count : 0 }}</p>
	    </div>
	  </div>
	</nav>
</div>
<br>
