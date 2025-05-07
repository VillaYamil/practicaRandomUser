<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel | Crear Usuarios Random</title>
    <!-- Incluir Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Traer usuarios desde la API RandomUser</h1>

    <form onsubmit="event.preventDefault(); enviar();" method="POST">
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad de usuarios:</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <a href="/user" class="btn btn-link mt-3">Volver al inicio</a>
</div>

<script>
function enviar() {
    let cantidad = document.getElementById('cantidad').value;
    let url = `https://randomuser.me/api/?results=${cantidad}`;

    fetch(url)
    .then(response => response.json())
    .then(data => {
        // Ahora enviamos los datos al backend (Laravel)
        fetch('/user/store', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data.results)
        })
        .then(res => res.json())
        .then(response => {
            alert(response.message);
        });
    });
}
</script>

<!-- Incluir Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
