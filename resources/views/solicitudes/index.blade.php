<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Listado de Solicitudes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container text-center">

  <div class="row">
    <div class="col">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Solicitudes</a>
        </div>
      </nav>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-3 text-start">
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Opción</a></li>
      </ul>
    </div>

    <div class="col-9">
      <p class="fs-1">Listado de Solicitudes</p>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tema</th>
            <th>Área</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($solicitudes as $solicitud)
            <tr>
              <td>{{ $solicitud->id }}</td>
              <td>{{ $solicitud->tema }}</td>
              <td>{{ $solicitud->area }}</td>
              <td>{{ $solicitud->estado }}</td>
              <td>
                <a href="{{ route('solicitudes.edit', $solicitud) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('solicitudes.destroy', $solicitud) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <a class="btn btn-primary" href="{{ route('solicitudes.create') }}">Nueva Solicitud</a>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
