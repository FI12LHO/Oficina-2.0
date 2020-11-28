<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Estimate extends Model
{
    protected $primaryKey = 'id';
    
    protected $table = 'estimate';

    protected $fillable = [
        'client_name', 'date', 'seller', 'description', 'value',
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at'
    ];

    /**
     * @param filter = Nome da coluna que ordena a busca
     * @param paginate = Quantidade de registros obtidos e retornados por busca
     * @return = os registros do BD filtrados por coluna
     */

    static function filterAllData($filter = 'date', $paginate = 15) {
        $data = DB::table('estimate') -> orderByDesc($filter) -> paginate($paginate);
        return $data;
    }
}
