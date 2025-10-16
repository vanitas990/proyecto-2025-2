<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Estudiantes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #f72585;
            --success: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --gradient: linear-gradient(135deg, #4361ee, #3a0ca3);
            --gradient-accent: linear-gradient(135deg, #f72585, #b5179e);
        }
        
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7ff;
            color: var(--dark);
            padding: 20px;
            background-image: 
                radial-gradient(#4361ee15 1px, transparent 1px),
                radial-gradient(#3a0ca315 1px, transparent 1px);
            background-size: 30px 30px, 60px 60px;
            background-position: 0 0, 15px 15px;
        }
        
        .container {
            max-width: 1200px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 20px;
        }
        
        header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f1f5f9;
        }
        
        h1 {
            color: var(--secondary);
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .subtitle {
            color: #64748b;
            font-size: 1.1rem;
        }
        
        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }
        
        .card-header {
            background: var(--gradient);
            color: white;
            border-radius: 12px 12px 0 0 !important;
            padding: 15px 20px;
            font-weight: 600;
            border: none;
        }
        
        .card-body {
            padding: 25px;
        }
        
        .btn-primary {
            background: var(--gradient);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }
        
        .btn-danger {
            background: var(--gradient-accent);
            border: none;
            border-radius: 8px;
            padding: 8px 15px;
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(247, 37, 133, 0.4);
        }
        
        .btn-sm {
            padding: 6px 12px;
            font-size: 0.875rem;
        }
        
        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        
        .table thead th {
            background: var(--primary);
            color: white;
            border: none;
            padding: 15px;
            font-weight: 600;
        }
        
        .table tbody td {
            padding: 15px;
            vertical-align: middle;
        }
        
        .table-hover tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #64748b;
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #cbd5e1;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }
        
        .modal-content {
            border-radius: 15px;
            overflow: hidden;
        }
        
        .modal-header {
            background: var(--gradient);
            color: white;
        }
        
        .stats-card {
            text-align: center;
            padding: 20px;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .stats-label {
            color: #64748b;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><i class="fas fa-user-graduate me-2"></i>Gestión de Estudiantes</h1>
            <p class="subtitle">Administra el registro de estudiantes de forma eficiente</p>
        </header>
        
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="stats-card">
                        <div class="stats-number">{{ isset($estudiantes) ? count($estudiantes) : 0 }}</div>
                        <div class="stats-label">Estudiantes Registrados</div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Acciones</div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                                    <i class="fas fa-plus me-2"></i>Agregar Estudiante
                                </button>
                            </div>
                            <div>
                                <input type="text" class="form-control" placeholder="Buscar estudiante...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">Lista de Estudiantes</div>
            <div class="card-body p-0">
                @if(isset($estudiantes) && count($estudiantes) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estudiantes as $est)
                                    <tr>
                                        <td>{{ $est->id }}</td>
                                        <td>{{ $est->nombre }}</td>
                                        <td>{{ $est->email }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit me-1"></i>Editar
                                                </button>
                                                <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $est->id }})">
                                                    <i class="fas fa-trash me-1"></i>Eliminar
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fas fa-user-slash"></i>
                        <h4>No hay estudiantes registrados</h4>
                        <p>Comienza agregando nuevos estudiantes al sistema.</p>
                        <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                            <i class="fas fa-plus me-2"></i>Agregar Primer Estudiante
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Modal para agregar estudiante -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">
                        <i class="fas fa-plus me-2"></i>Agregar Nuevo Estudiante
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addStudentForm">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="addStudent()">Guardar Estudiante</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de confirmación para eliminar -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este estudiante? Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Función para mostrar modal de confirmación de eliminación
        function confirmDelete(id) {
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            document.getElementById('confirmDeleteButton').onclick = function() {
                deleteStudent(id);
                deleteModal.hide();
            };
            deleteModal.show();
        }
        
        // Función para eliminar estudiante (simulada)
        function deleteStudent(id) {
            // Aquí iría la lógica real para eliminar el estudiante
            console.log(`Eliminando estudiante con ID: ${id}`);
            // Simulamos una eliminación exitosa
            alert(`Estudiante con ID ${id} eliminado correctamente.`);
            // En una aplicación real, aquí haríamos una petición AJAX o recargaríamos la página
        }
        
        // Función para agregar estudiante (simulada)
        function addStudent() {
            const nombre = document.getElementById('nombre').value;
            const email = document.getElementById('email').value;
            
            if (!nombre || !email) {
                alert('Por favor, complete todos los campos obligatorios.');
                return;
            }
            
            // Aquí iría la lógica real para agregar el estudiante
            console.log(`Agregando estudiante: ${nombre}, ${email}`);
            // Simulamos una adición exitosa
            alert(`Estudiante ${nombre} agregado correctamente.`);
            
            // Cerramos el modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('addStudentModal'));
            modal.hide();
            
            // Limpiamos el formulario
            document.getElementById('addStudentForm').reset();
            
            // En una aplicación real, aquí haríamos una petición AJAX o recargaríamos la página
        }
        
        // Búsqueda de estudiantes
        document.querySelector('input[type="text"]').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                
                if (name.includes(searchTerm) || email.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
