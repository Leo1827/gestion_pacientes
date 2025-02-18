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
            // View employee
            Route::get('/employee', [EmployeeController::class, 'getPaciente'])->name('employee');
            Route::get('/employee/add', [EmployeeController::class, 'getAddPaciente'])->name('employeeAdd');
    
        });
    });
    
?>
