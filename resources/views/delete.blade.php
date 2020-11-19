<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/delete.css')}}">
    <title>Oficina 2.0</title>
</head>
<body>
    <div class="info">
        <span>Tem certeza que deseja deletar o registro?</span>
        <form method="post" action="{{url('destroy/' . $id)}}" id="delete-form">
            @method('delete')
            @csrf
            <input type="hidden" name="id" id="input_id" value="{{$id}}">
        </form>
        <div class="controls">
            <button type="submit" form="delete-form">SIM</button>
            <a href="{{url('/')}}"><button>NÃO</button></a>
        </div>
    </div>
</body>
</html>