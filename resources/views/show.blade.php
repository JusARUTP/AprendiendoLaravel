<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hola esto es vitas condicionales</h1>

    @if($nombreusuario)
        <h2>Hola usuario {{$nombreusuario}} tu id es {{$IDusuario}}</h2> 
    @else
        <h2>Hola tu id es: {{$IDusuario}}</h2>
    @endif
    
</body>
</html>

