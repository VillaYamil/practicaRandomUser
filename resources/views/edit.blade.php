<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 12 | posts</title>
</head>
<body>
<h1>Aca se va a editar un post con un formulario</h1>

<form action="/posts/{{$post->id}}" method="POST">
    @csrf
    @method('PUT')
    <label>Name:
        <input type="text" name="name" value="{{$user->name}}">
    </label>
    <br><br>
    <label>Email:
        <input type="text" name="email" value="{{$user->email}}">
    </label>
    <br><br>
    <label>Password:
    <input type="text" name="password" value="{{$user->password}}">
    </label>
    <br><br>
    <button type="submit">Actualizar user</button>
</form>
</body>
</html>