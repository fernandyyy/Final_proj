<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessCandidateActionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $candidate;
    protected $action;

    /**
     * Cria uma nova instância do Job.
     */
    public function __construct($candidate, $action)
    {
        $this->candidate = $candidate;
        $this->action = $action;
    }

    /**
     * Executa o Job.
     */
    public function handle()
    {
        $logMessage = match ($this->action) {
            'created' => "Candidato criado: Nome: {$this->candidate->name}, Email: {$this->candidate->email}",
            'updated' => "Candidato atualizado: Nome: {$this->candidate->name}, Email: {$this->candidate->email}",
            'deleted' => "Candidato excluído: Nome: {$this->candidate->name}, Email: {$this->candidate->email}",
            default => "Ação desconhecida para o candidato.",
        };

        Log::channel('candidate_logs')->info($logMessage);
    }
}
