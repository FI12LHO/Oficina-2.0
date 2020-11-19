<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>Oficina 2.0</title>
</head>
<body>
    <div class="menu">
        <a href="{{url('create')}}">
            <button>Cadastrar Orçamento</button>
        </a>
    </div>
    <div class="estimate-container">
        <div class="estimate-container">
            <table>
                <thead>
                    <td>
                        <span>
                            <a href='{{url('/?filter=client_name')}}'>Cliente &#8595;</a>
                        </span>
                    </td>
                    <td>
                        <span>
                            <a href='{{url('/?filter=seller')}}'>Vendedor &#8595;</a>
                        </span>
                    </td>
                    <td>
                        <span>
                            <a href='{{url('/?filter=date')}}'>Data &#8595;</a>
                        </span>
                    </td>
                    <td>
                        <span>
                            <a href='{{url('/?filter=value')}}'>Valor &#8595;</a>
                        </span>
                    </td>
                    <td>
                        <span>Descricao</span>
                    </td>
                </thead>
        
                <tbody>
                    @isset($estimate_list)
                        @foreach ($estimate_list as $estimate)
                            <tr>
                                <td>
                                    <span>{{ $estimate -> client_name }}</span>
                                </td>
                                <td>
                                    <span>{{ $estimate -> seller }}</span>
                                </td>
                                <td>
                                    {{ $estimate -> date }}
                                </td>
                                <td>
                                    <span>
                                        R$ {{ $estimate -> value }}
                                    </span>
                                </td>
                                <td>
                                    <p>
                                        {{ $estimate -> description }}
                                    </p>
                                </td>
                                <td>
                                    <a href="{{url('show/' . $estimate -> id)}}">
                                        <button>Editar</button>
                                    </a>
                                    <a href="{{url('delete/' . $estimate -> id)}}">
                                        <button>Deletar</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
    
    @isset($estimate_list)
        {{ $estimate_list->links() }}
    @endisset
</body>
</html>