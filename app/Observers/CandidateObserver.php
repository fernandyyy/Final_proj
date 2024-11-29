<?php

namespace App\Observers;

use App\Jobs\ProcessCandidateActionJob;
use App\Models\Candidate;

class CandidateObserver
{
    /**
     * Quando um candidato for criado.
     */
    public function created(Candidate $candidate)
    {
        $action = 'created';
        ProcessCandidateActionJob::dispatch($candidate, $action);
    }

    /**
     * Quando um candidato for atualizado.
     */
    public function updated(Candidate $candidate)
    {
        $action = 'updated';
        ProcessCandidateActionJob::dispatch($candidate, $action);
    }

    /**
     * Quando um candidato for excluído.
     */
    public function deleted(Candidate $candidate)
    {
        $action = 'deleted';
        ProcessCandidateActionJob::dispatch($candidate, $action);
    }
}
