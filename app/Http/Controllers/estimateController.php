<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Estimate;

class estimateController extends Controller
{
    public function index()
    {
        /**
         * @var filter = recupera da url pelo metodo GET o nome da coluna que ira ordenar a query ao DB
         * @var estimate_list = armazena o resultado da consulta ordenada por coluna na ordem decrescente
         * @method paginate = adicionado o metodo a consulta, gera uma paginação de 15 linhas por consulta
         * @return = retorna a view index (listagem) e o resultado da query com a paginação
         */

        $filter = (isset($_GET['filter'])) ? $_GET['filter'] : 'date';
        $estimate_list = DB::table('estimate') -> orderByDesc($filter) -> paginate(15);

        return view('index', compact('estimate_list'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        /**
         * @param request = obtem todas as requisiçoes atraves da classe Request(tipagem estatica)
         * @var post = Recebe os dados da url pelo metodo POST
         * @var new_estimate = Um array com chaves nomeadas(colunas do BD) e os valores recuperados respectivamente
         * @return = após criar um novo registro no BD, redireciona o usuario a pagina index(listagem)
         */

        $post = $request -> post();
        $new_estimate = [
            'client_name' => $post['client_name'],
            'seller' => $post['seller'],
            'date' => $post['date'],
            'description' => $post['description'],
            'value' => $post['value'],
        ];
        Estimate::create($new_estimate);

        return redirect('/');
    }

    public function show($id)
    {
        /**
         * @param id = chave primaria do registro dentro do BD
         * @var estimate = armazena os dados encontrados pelo metodo find() da classe Estimate de acordo com o ID
         * @return = Retorna a view show e os dados da variavel estimate
         */

        $estimate = Estimate::find($id);

        return view('show', compact('estimate'));
    }

    public function edit(Request $request, $id)
    {
        /**
         * @param request = obtem todas as requisiçoes atraves da classe Request(tipagem estatica)
         * @param id = chave primaria do registro dentro do BD
         * @var post = Recebe os dados da url pelo metodo POST
         * @var new_estimate = Um array com chaves nomeadas(colunas do BD) e os valores recuperados respectivamente
         * @var estimate = obtem os dados encontrados pelo metodo find e atualiza os mesmos
         * @return = após atualizar um registro no BD, redireciona o usuario a pagina index(listagem)
         */

        $post = $request -> post();
        $new_estimate = [
            'client_name' => $post['client_name'],
            'seller' => $post['seller'],
            'date' => $post['date'],
            'description' => $post['description'],
            'value' => $post['value'],
        ];
        $estimate = Estimate::find($id);
        $estimate -> update($new_estimate);

        return redirect('/');
    }

    public function delete($id)
    {
        return view('delete', compact('id'));
    }

    public function destroy($id)
    {
        /**
         * @param id = chave primaria do registro dentro do BD
         * @var estimate = obtem os dados encontrados pelo metodo find() e deleta os mesmos
         * @return = após deletar o registro do BD, redireciona o usuario a pagina index(listagem)
         */

        $estimate = Estimate::find($id);
        $estimate -> delete();

        return redirect('/');
    }
}
