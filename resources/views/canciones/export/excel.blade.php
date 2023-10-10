<table>
	<thead>
		<tr>
			<th style="background-color:black;color:white">Título</th>
			<th style="background-color:black;color:white">Autor</th>
			<th style="background-color:black;color:white">Indicador de tempo</th>
			<th style="background-color:black;color:white">Estatus</th>
			<th style="background-color:black;color:white">Etiquetas</th>
		</tr>
	</thead>
	<tbody>
		@foreach($canciones as $cancion)
		<tr>
			<td>{{ $cancion->titulo }}</td>
			<td>{{ $cancion->autor }}</td>
			<td>
				<span>{{ $cancion->indicador_tempo }}</span>
			</td>
			<td>
				<span>{{ $cancion->estatus }}</span>
			</td>
			<td>{{ $cancion->etiquetas->implode('nombre', ',') }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
