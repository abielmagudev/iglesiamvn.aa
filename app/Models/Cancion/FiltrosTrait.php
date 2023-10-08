<?php

namespace App\Models\Cancion;

use DB;
use App\Models\CancionCantante;
use App\Models\CancionEtiqueta;
use App\Models\Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait FiltrosTrait
{
	public static $filtros = [
		'autor' => 'whereAutor',
		'estatus' => 'whereEstatus',
		'etiquetas' => 'whereEtiquetas',
		'indicador_tempo' => 'whereIndicadorTempo',
		'interprete' => 'whereInterprete',
		'letra' => 'whereLetra',
		'titulo' => 'whereTitulo',
	];

	public function scopeFiltros($query, Request $request)
	{
		foreach(self::$filtros as $input => $filter) {
			
			if( $request->has($input) )
				call_user_func_array([$query, $filter], $request->only($input));

		}

		return $query;
	}

	public function scopeWhereAutor($query, $value)
	{
		if( empty($value) )
			return $query;

		return $query->where('autor', 'like', "%$value%");
	}

	public function scopeWhereEstatus($query, $value)
	{
		if( empty($value) )
			return $query;

		return $query->where('estatus', $value);
	}

	public function scopeWhereEtiquetas($query, $value)
	{
		if( empty($value) ||! $etiqueta_ids = Etiqueta::whereIn('nombre', explode(',', $value))->pluck('id')->toArray() )
			return $query;

		return $query->orWhereIn('id', function ($subquery) use ($etiqueta_ids) {

			$subquery->select('cancion_id')
			 		 ->from( with(new CancionEtiqueta)->getTable() )
			 		 ->whereIn('etiqueta_id', $etiqueta_ids);

		});
	}

	public function scopeWhereIndicadorTempo($query, $value)
	{
		if( empty($value) )
			return $query;

		return $query->where('indicador_tempo', $value);
	}

	public function scopeWhereInterprete($query, $value)
	{
		if(! ctype_digit($value) )
			return $query;

		return $query->whereIn('id', function ($subquery) use ($value) {

			$subquery->select('cancion_id')
					 ->from( with(new CancionCantante)->getTable() )
					 ->where('cantante_id', $value);

		});
	}

	public function scopeWhereLetra($query, $value)
	{
		if( empty($value) )
			return $query;

		return $query->where('letra', 'like', "%{$value}%");

		// return $query->where(DB::raw('LOWER(letra)'), 'like', '%' . strtolower($value) . '%');
		
		// return $query->whereRaw("MATCH(letra) AGAINST(? IN BOOLEAN MODE)", [$value]);
	}

	public function scopeWhereTitulo($query, $value)
	{
		if( empty($value) )
			return $query;

		return $query->where('titulo', 'like', "%$value%");
	}
}
