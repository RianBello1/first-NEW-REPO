<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// The main page (List all tasks)
Route::get('/', [TaskController::class, 'index']);

// Create a new task
Route::post('/tasks', [TaskController::class, 'store']);

// Toggle task (Done/Not Done)
Route::patch('/tasks/{id}', [TaskController::class, 'update']);

// Delete a task
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
