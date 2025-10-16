<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nuevo Estudiante</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Mantén tus estilos actuales aquí */
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #f72585;
            --success: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --gradient: linear-gradient(135deg, #4361ee, #3a0ca3);
        }
        
        /* ... (mantén el resto de tus estilos) ... */
    </style>
</head>
<body>
    <div class="container">
        <div class="back-button">
            <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Volver al Listado
            </a>
        </div>
        
        <header>
            <h1><i class="fas fa-user-plus me-2"></i>Registrar Nuevo Estudiante</h1>
            <p class="subtitle">Complete todos los campos obligatorios (*)</p>
        </header>
        
        <div class="card">
            <div class="card-header">Datos del Estudiante</div>
            <div class="card-body">
                <form action="{{ route('estudiantes.store') }}" method="POST">
                    @csrf
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="codigo" class="form-label">Código del Estudiante *</label>
                            <input type="text" class="form-control @error('codigo') is-invalid @enderror" 
                                   id="codigo" name="codigo" value="{{ old('codigo') }}" required 
                                   placeholder="Ej: EST2024001" maxlength="21">
                            @error('codigo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="dni" class="form-label">DNI *</label>
                            <input type="text" class="form-control @error('dni') is-invalid @enderror" 
                                   id="dni" name="dni" value="{{ old('dni') }}" required 
                                   pattern="[0-9]{8}" title="8 dígitos numéricos" maxlength="8">
                            @error('dni')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombres" class="form-label">Nombres *</label>
                            <input type="text" class="form-control @error('nombres') is-invalid @enderror" 
                                   id="nombres" name="nombres" value="{{ old('nombres') }}" required 
                                   maxlength="120" placeholder="Ej: Juan Carlos">
                            @error('nombres')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="pri_ape" class="form-label">Primer Apellido *</label>
                            <input type="text" class="form-control @error('pri_ape') is-invalid @enderror" 
                                   id="pri_ape" name="pri_ape" value="{{ old('pri_ape') }}" required 
                                   maxlength="120" placeholder="Ej: Pérez">
                            @error('pri_ape')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="seg_ape" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control @error('seg_ape') is-invalid @enderror" 
                                   id="seg_ape" name="seg_ape" value="{{ old('seg_ape') }}" 
                                   maxlength="100" placeholder="Ej: González">
                            @error('seg_ape')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Registrar Estudiante
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
