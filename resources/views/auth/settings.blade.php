@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Status Message -->
            @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h3 class="mb-0">Autenticação em Dois Fatores</h3>
                </div>

                <div class="card-body text-center">
                    <div class="mb-4">
                        <h5 class="mb-3">Status Atual</h5>
                        @if(auth()->user()->two_factor_enabled)
                            <span class="badge bg-success p-2" style="font-size: 1em;">
                                <i class="ri-shield-check-line me-2"></i>Ativada
                            </span>
                        @else
                            <span class="badge bg-secondary p-2" style="font-size: 1em;">
                                <i class="ri-shield-line me-2"></i>Desativada
                            </span>
                        @endif
                    </div>
                    
                    <form method="POST" action="{{ route('settings.toggleTwoFactor') }}" class="mt-4">
                        @csrf
                        <button type="submit" class="btn {{ auth()->user()->two_factor_enabled ? 'btn-danger' : 'btn-primary' }} btn-lg">
                            @if(auth()->user()->two_factor_enabled)
                                <i class="ri-lock-line me-2"></i>Desativar
                            @else
                                <i class="ri-lock-unlock-line me-2"></i>Ativar
                            @endif
                            Autenticação em Dois Fatores
                        </button>
                    </form>

                    <div class="mt-4 text-muted">
                        <small>
                            @if(auth()->user()->two_factor_enabled)
                                A autenticação em dois fatores está ativa para sua conta.
                            @else
                                Adicione uma camada extra de segurança ativando a autenticação em dois fatores.
                            @endif
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
        border-radius: 12px;
    }
    .card-header {
        border-bottom: none;
    }
    .btn-lg {
        padding: 0.75rem 2.5rem;
        border-radius: 8px;
    }
</style>
@endsection