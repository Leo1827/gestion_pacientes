<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;

    // Rutas protegidas
    // Middleware que evita que ya con acceso no deja ver vista de login
    Route::middleware('auth')->group(function () {
        
        Route::prefix('/admin')->group(function () {
            // View dashboard admin
            Route::get('/', [DashboardController::class, 'getDashboard'])->name('dashboard');
            // View Table paciente
            Route::get('/employee', [EmployeeController::class, 'getPaciente'])->name('employee');
            // View GET add paciente
            Route::get('/employee/add', [EmployeeController::class, 'getAddPaciente'])->name('employeeAdd');
            // Route GET edit paciente
            Route::get('/paciente/edit/{id}', [EmployeeController::class, 'getEditPaciente'])->name('employeeGetEdit');

            // Route Municipios - Departamentos
            Route::get('/municipios/{departamento}', function ($departamento) {
                return response()->json(
                    \App\Models\Municipio::where('departamento_id', $departamento)->get()
                );
            })->name('getMunicipios');

            // Route POST add Paciente
            Route::post('/paciente/add', [EmployeeController::class, 'postAddPaciente'])->name('pacienteAddPost');
            // Route POST edit Paciente
            Route::post('/paciente/{id}/edit', [EmployeeController::class, 'postEditPaciente'])->name('pacientePostEdit');

    
        });
    });
    
?>
