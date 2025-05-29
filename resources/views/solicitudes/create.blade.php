<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrar Solicitud</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container text-center">
  <p class="fs-1">Registro de Solicitud</p>

  @if($errors->any())
    <div class="alert alert-danger text-start">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('solicitudes.store') }}" method="POST" class="text-start">
    @csrf
    <div class="mb-3">
      <label class="form-label">Tema</label>
      <input type="text" name="tema" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <textarea name="descripcion" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Área</label>
      <select name="area" class="form-select" required>
        <option value="TI">TI</option>
        <option value="contabilidad">Contabilidad</option>
        <option value="administracion">Administración</option>
        <option value="operaciones">Operaciones</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Fecha de Registro</label>
      <input type="date" name="fecha_registro" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Estado</label>
      <select name="estado" class="form-select">
        <option value="solicitando">Solicitando</option>
        <option value="aprobado">Aprobado</option>
        <option value="rechazado">Rechazado</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Observaciones</label>
      <textarea name="observaciones" class="form-control"></textarea>
    </div>
    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" name="usuario_ext" value="1" id="usuario_ext">
      <label class="form-check-label" for="usuario_ext">Usuario Externo</label>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
