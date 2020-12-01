<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/show.css')}}">
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
        <form action="{{url('edit/' . $estimate -> id)}}" method="post" id="form">
            @method('put')
            @csrf
            <div class="block">
                <label for="input_client_name">Cliente</label>
                <input type="text" 
                    name="client_name" id="input_client_name"
                    placeholder="Nome do cliente" value="{{$estimate -> client_name}}" required>
            </div>
            <div class="block">
                <label for="input_seller">Vendedor</label>
                <input type="text" 
                    name="seller" id="input_seller"
                    placeholder="Nome do vendedor" value="{{$estimate -> seller}}" required>
            </div>
            <div class="block">
                <label for="input_value">Valor</label>
                <input type="text" name="value" 
                    id="input_value" onchange="changeFieldValue(this)"
                    placeholder="Valor do orçamento" value="{{$estimate -> value}}" required>
            </div>
            <div class="block">
                <label for="input_date">Data e hora</label>
                <input type="datetime-local"
                    name="date" id="input_date"
                    required>
            </div>
            <div class="block">
                <label for="textarea_description">Descrição</label>
                <textarea name="description" id="textarea_description"
                    cols="30" rows="10" placeholder="Descrição" 
                    required>{{$estimate -> description}}</textarea>
            </div>
        </form>
        <div class="controls">
            <a href="{{url('/')}}"><button>Cancelar</button></a>
            <button type="submit" form="form">Atualizar orçamento</button>
        </div>
    </div>

    <script src="{{asset('js/validation.js')}}"></script>
</body>
</html>