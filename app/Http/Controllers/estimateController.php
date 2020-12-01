<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Model\Estimate;

/**
 * @author Marlom Marques
 * @version 1.0
 * @since 01/12/2020
 */
class estimateController extends Controller
{
    /**
     * Metodo responsavel por tratar e listar todos os registros cadastrados no banco de dados.
     * Recupera da url pelo metodo GET o nome da coluna que ira ordenar a query ao DB e armazena o resultado da consulta ordenada por coluna na ordem decrescente.
     * @return view - Retorna a view index (listagem) e o resultado da query com a paginação
     */
    public function index()
    {
        $filter = (isset($_GET['filter'])) ? $_GET['filter'] : 'date';
        $estimate_list = Estimate::filterAllData($filter, 15);

        return view('index', compact('estimate_list'));
    }
    /**
     * Metodo responsavel por apresentar uma view com o formulario para criação de registros
     * @return view
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Metodo responsavel por criar um novo registro no banco de dados.
     * Recebe dados do formulario enviados pelo metodo POST e criar uma matriz chaveada com os respectivos dados.
     * @param request - Obtem todas as requisiçoes atraves da classe Request(tipagem estatica).
     * @return redirect - Após criar um novo registro no BD, redireciona o usuario a pagina index(listagem).
     */
    public function store(Request $request)
    {
        $validate_data = $request -> validate([
            'client_name' => ['required', 'max:255'],
            'seller' => ['required', 'max:255'],
            'date' => ['required', 'max:255'],
            'description' => ['required'],
            'value' => ['required'],
        ]);

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

    /**
     * Metodo responsavel por retornar um unico resgitro do banco de dados, que tenha a chave primaria de acordo com a busca.
     * Realiza a busca pelo metodo find() da classe (Model) Estimate recebendo como parametro o id do registro.
     * @param id - Valor da chave primaria do registro dentro do banco de dados.
     * @return view - Retorna a view show e os dados da variavel estimate
     */
    public function show($id)
    {
        $estimate = Estimate::find($id);

        return view('show', compact('estimate'));
    }

    /**
     * Metodo responsavel por atualizar um registro dentro do banco de dados.
     * Acessando os dados do registro por meio do metodo find() da classe (Model) Estimate recebendo como parametro o id do registro.
     * Recebe dados do formulario enviados pelo metodo POST e criar uma matriz chaveada com os respectivos dados.
     * @param request - Obtem todas as requisiçoes atraves da classe Request(tipagem estatica).
     * @param id - Chave primaria do registro dentro do banco de dados.
     * @return redirect - Após atualizar um registro no banco de dados, redireciona o usuario a pagina index(listagem).
     */
    public function edit(Request $request, $id)
    {
        $validate_data = $request -> validate([
            'client_name' => ['required', 'max:255'],
            'seller' => ['required', 'max:255'],
            'date' => ['required', 'max:255'],
            'description' => ['required'],
            'value' => ['required'],
        ]);
        
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

    /**
     * Metodo responsavel por apresentar uma view, para confirmação da solicitação de remoção de um registro.
     * @return view
     */
    public function delete($id)
    {
        return view('delete', compact('id'));
    }

    /**
     * Metodo responsavel por deletar um registro do banco de dados, de acordo com sua chave primaria (id).
     * Obtem os dados encontrados pelo metodo find() e deleta os mesmos.
     * @param id - Chave primaria do registro dentro do BD.
     * @return redirect - Após deletar o registro do BD, redireciona o usuario a pagina index(listagem).
     */
    public function destroy($id)
    {
        $estimate = Estimate::find($id);
        $estimate -> delete();

        return redirect('/');
    }
}
