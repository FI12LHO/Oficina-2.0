<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @author Marlom Marques
 * @version 1.0
 * @since 01/12/2020
 */
class Estimate extends Model
{
    /**
     * Tabela associada a classe (Model)
     */
    protected $table = 'estimate';

    /**
     * Chave primaria da tabela associada
     */
    protected $primaryKey = 'id';

    /**
     * Campos da tabela associada
     */
    protected $fillable = [
        'client_name', 'date', 'seller', 'description', 'value',
    ];

    /**
     * Metodo responsavel por executar uma busca dentro do banco de dados filtrando por campo.
     * A quantidade de registros obtidos pela busca se limita ao valor recebido pelo parametro paginate, que por padrao e 15.
     * @param filter - Nome da coluna que ordena a busca
     * @param paginate - Quantidade de registros obtidos e retornados por busca
     * @return Array - Os registros do BD filtrados por coluna
     */
    static function filterAllData($filter = 'date', $paginate = 15) {
        $data = DB::table('estimate') -> orderByDesc($filter) -> paginate($paginate);
        return $data;
    }
}
