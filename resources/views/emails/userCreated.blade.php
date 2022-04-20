<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario creado</title>
</head>
<body>
Bienvenido {{ $user->name }}, tu email es {{ $user->email }} y tu contraseña es {{ $password }}
<br><br>
Ingresa <a href="{{ url('/') }}">aquí</a>
</body>
</html>
