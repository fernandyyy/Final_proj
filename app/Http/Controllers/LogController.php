<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function index()
    {
        $logFilePath = storage_path('logs/candidate_jobs.log');
        
        if (!File::exists($logFilePath)) {
            return view('logs.index', ['logs' => [], 'message' => 'Nenhum log encontrado.']);
        }
    
        $logs = File::get($logFilePath);
        $logsArray = array_filter(explode("\n", $logs)); // Remove linhas vazias
    
        return view('logs.index', ['logs' => $logsArray, 'message' => null]);
    }
    
}
