<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Solicitud</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container text-center">
  <p class="fs-1">Editar Solicitud</p>

  <form action="{{ route('solicitudes.update', $solicitud) }}" method="POST" class="text-start">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label class="form-label">Tema</label>
      <input type="text" name="tema" class="form-control" value="{{ $solicitud->tema }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <textarea name="descripcion" class="form-control" required>{{ $solicitud->descripcion }}</textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Área</label>
      <select name="area" class="form-select" required>
        @foreach(['TI', 'contabilidad', 'administracion', 'operaciones'] as $area)
          <option value="{{ $area }}" {{ $solicitud->area == $area ? 'selected' : '' }}>{{ $area }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Fecha de Registro</label>
      <input type="date" name="fecha_registro" class="form-control" value="{{ $solicitud->fecha_registro }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Estado</label>
      <select name="estado" class="form-select">
        @foreach(['solicitando', 'aprobado', 'rechazado'] as $estado)
          <option value="{{ $estado }}" {{ $solicitud->estado == $estado ? 'selected' : '' }}>{{ $estado }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Observaciones</label>
      <textarea name="observaciones" class="form-control">{{ $solicitud->observaciones }}</textarea>
    </div>
    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" name="usuario_ext" value="1" id="usuario_ext" {{ $solicitud->usuario_ext ? 'checked' : '' }}>
      <label class="form-check-label" for="usuario_ext">Usuario Externo</label>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
