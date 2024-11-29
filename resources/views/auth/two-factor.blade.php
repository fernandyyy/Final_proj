@extends('layouts.guest2')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-gray-50 to-gray-100 p-6">
    <div class="w-full max-w-sm bg-white rounded-lg shadow-md p-6 relative overflow-hidden">
        <!-- Accent Decoration -->
        <div class="absolute -top-6 -left-6 w-20 h-20 bg-violet-100 rounded-full mix-blend-multiply opacity-50 animate-pulse"></div>
        <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-fuchsia-100 rounded-full mix-blend-multiply opacity-50 animate-pulse"></div>

        <!-- Header Section -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-extrabold text-gray-800 tracking-tight">
                Confirme o Código
            </h1>
            <p class="mt-2 text-sm text-gray-500">
                Insira o código de 6 dígitos enviado para o seu e-mail
            </p>
        </div>

        <!-- Form Section -->
        <form action="{{ route('auth.two-factor') }}" method="POST" class="space-y-5">
            @csrf

            <div class="flex justify-between gap-2">
                @for ($i = 1; $i <= 6; $i++)
                <input
                    type="text"
                    name="code_digit_{{$i}}"
                    maxlength="1"
                    class="w-12 h-12 text-lg font-semibold text-center rounded-md border border-gray-300 focus:ring-2 focus:ring-violet-300 focus:outline-none transition-shadow"
                    oninput="if(this.value.length === 1) { if(this.nextElementSibling) this.nextElementSibling.focus() }"
                    onkeydown="if(event.key === 'Backspace' && !this.value && this.previousElementSibling) this.previousElementSibling.focus()"
                >
                @endfor
            </div>

            <input type="hidden" name="two_factor_code" id="two_factor_code">
            
            @error('two_factor_code')
            <p class="text-center text-xs text-red-500 mt-1">
                {{ $message }}
            </p>
            @enderror

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full py-3 px-4 text-white font-medium rounded-md bg-violet-600 hover:bg-violet-700 transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-violet-500"
                onclick="combineInputs()"
            >
                Confirmar Código
            </button>

            <!-- Help Text -->
            <p class="text-center text-xs text-gray-500">
                Não recebeu o código? 
                <a href="#" class="text-violet-600 hover:underline">
                    Reenviar
                </a>
            </p>
        </form>
    </div>
</div>

<script>
function combineInputs() {
    const inputs = document.querySelectorAll('input[name^="code_digit_"]');
    const combined = Array.from(inputs).map(input => input.value).join('');
    document.getElementById('two_factor_code').value = combined;
}
</script>

<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
}
</style>
@endsection
