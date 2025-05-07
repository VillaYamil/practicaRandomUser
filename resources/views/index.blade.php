<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Usuarios</title>

    <!-- Cargar Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @if(session('success'))
        <script>
            window.onload = function() {
                const mensaje = "{{ session('success') }}";
                const alerta = document.createElement('div');
                alerta.textContent = mensaje;
                alerta.classList.add('alert', 'alert-success', 'fixed-top', 'm-3');
                alerta.style.zIndex = '9999';
                document.body.appendChild(alerta);

                setTimeout(() => {
                    alerta.remove();
                }, 3000);
            }
        </script>
    @endif

    <div class="container mt-5">
        <h1 class="mb-4 text-center">Index Usuarios</h1>

        <div class="mb-4 text-center">
            <a href="/user/random" class="btn btn-primary m-2">Crear un usuario con RandomUser</a>
            <a href="/user/create" class="btn btn-success m-2">Crear un nuevo usuario</a>
            <a href="/user/todos" class="btn btn-info m-2">Mostrar lista de usuarios</a>
        </div>

        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <form action="/user/buscar" method="GET">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Buscar usuario por ID:</label>
                        <input type="number" name="user_id" id="user_id" class="form-control" placeholder="Introducir el ID del usuario">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">O buscar usuario por nombre:</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Introducir el nombre del usuario">
                    </div>

                    <button type="submit" class="btn btn-success w-100">Buscar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Cargar Bootstrap JS (opcional si usas componentes interactivos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
