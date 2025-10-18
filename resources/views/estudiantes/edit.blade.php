<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
        }
        
        body {
            background-color: #f5f7ff;
            color: var(--dark);
            min-height: 100vh;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        
        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background: linear-gradient(135deg, #4361ee, #3a0ca3);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4361ee, #3a0ca3);
            border: none;
            padding: 10px 25px;
            font-weight: 600;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #3a0ca3, #4361ee);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }
        
        .form-control:focus {
            border-color: #4361ee;
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }
        
        .back-link {
            color: #4361ee;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
        }
        
        .back-link:hover {
            color: #3a0ca3;
            text-decoration: underline;
        }
        
        .form-label {
            font-weight: 500;
            color: #495057;
        }
        
        .required-field::after {
            content: " *";
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0"><i class="fas fa-user-edit me-2"></i>Editar Estudiante</h4>
                            <a href="{{ route('estudiantes.index') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-arrow-left me-1"></i> Volver
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>¡Error!</strong> Por favor corrige los errores en el formulario.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="codigo" class="form-label required-field">Código</label>
                                    <input type="text" name="codigo" class="form-control" id="codigo" 
                                           value="{{ old('codigo', $estudiante->codigo) }}" 
                                           placeholder="Ingrese el código del estudiante" required>
                                    @error('codigo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="dni" class="form-label required-field">DNI</label>
                                    <input type="text" name="dni" class="form-control" id="dni" 
                                           value="{{ old('dni', $estudiante->dni) }}" 
                                           placeholder="Ingrese el DNI (8 dígitos)" maxlength="8" required>
                                    @error('dni')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="nombres" class="form-label required-field">Nombres</label>
                                <input type="text" name="nombres" class="form-control" id="nombres" 
                                       value="{{ old('nombres', $estudiante->nombres) }}" 
                                       placeholder="Ingrese los nombres del estudiante" required>
                                @error('nombres')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pri_ape" class="form-label required-field">Primer Apellido</label>
                                    <input type="text" name="pri_ape" class="form-control" id="pri_ape" 
                                           value="{{ old('pri_ape', $estudiante->pri_ape) }}" 
                                           placeholder="Ingrese el primer apellido" required>
                                    @error('pri_ape')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="seg_ape" class="form-label">Segundo Apellido</label>
                                    <input type="text" name="seg_ape" class="form-control" id="seg_ape" 
                                           value="{{ old('seg_ape', $estudiante->seg_ape) }}" 
                                           placeholder="Ingrese el segundo apellido (opcional)">
                                    @error('seg_ape')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Actualizar Estudiante
                                </button>
                                <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-1"></i> Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validación básica del formulario
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            
            form.addEventListener('submit', function(e) {
                let valid = true;
                
                // Validar que el DNI tenga exactamente 8 dígitos
                const dni = document.getElementById('dni');
                if (dni.value.length !== 8 || !/^\d+$/.test(dni.value)) {
                    alert('El DNI debe tener exactamente 8 dígitos numéricos.');
                    valid = false;
                }
                
                if (!valid) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
