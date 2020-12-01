<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/create.css')}}">
    <title>Oficina 2.0</title>
</head>
<body>
    <div class="estimate-container">
        @if($errors -> any())
            <div>
                @foreach ($errors -> all() as $error)
                    <li><strong>{{$error}}</strong></li>
                @endforeach
            </div>
        @endif
        <form action="{{url('create')}}" method="post" id="form">
            @method('POST')
            @csrf
            <input type="text" 
                name="client_name" id="input_client_name"
                placeholder="Qual o nome do cliente?" required>
                
            <input type="text" 
                name="seller" id="input_seller"
                placeholder="Qual o nome do vendedor?" required>
    
            <input type="text" name="value" 
                id="input_value" onchange="changeFieldValue(this)"
                placeholder="Valor do orçamento" required>
    
            <input type="datetime-local"
                name="date" id="input_date" required>
    
            <textarea name="description" id="textarea_description"
                placeholder="Adicione uma descrição" 
                cols="30" rows="10" required></textarea>
        </form>
        <div class="controls">
            <a href="{{url('/')}}"><button>Cancelar</button></a>
            <button type="submit" form="form-create"
                id="btn-create-estimate">Cadastrar</button>
        </div>
    </div>

    <script src="{{asset('js/validation.js')}}"></script>
</body>
</html>