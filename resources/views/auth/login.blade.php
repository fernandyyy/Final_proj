<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-semibold text-gray-800 text-center">Bem-vindo de volta</h1>
        <p class="text-gray-500 text-center mt-2">Acesse sua conta abaixo</p>
        
        <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
            @csrf
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    required 
                    placeholder="Digite seu e-mail" 
                    class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    placeholder="Digite sua senha" 
                    class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
            </div>
            
            <div class="flex justify-between items-center">
                <label class="flex items-center text-sm text-gray-600">
                    <input 
                        id="remember" 
                        type="checkbox" 
                        name="remember" 
                        class="text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                    >
                    <span class="ml-2">Lembrar de mim</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">Esqueceu sua senha?</a>
                @endif
            </div>
            
            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition-all">
                Entrar
            </button>
        </form>
        
        <div class="mt-4">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">Ou entre com</span>
                </div>
            </div>

            <a 
                href="{{ route('auth.github') }}" 
                class="mt-4 flex items-center justify-center w-full py-2 border border-gray-300 rounded-md text-gray-700 bg-gray-50 hover:bg-gray-100 transition-all shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0C5.373 0 0 5.373 0 12c0 5.304 3.438 9.8 8.207 11.385.6.11.793-.26.793-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61-.546-1.385-1.333-1.753-1.333-1.753-1.09-.745.083-.73.083-.73 1.205.085 1.838 1.236 1.838 1.236 1.07 1.836 2.809 1.305 3.495.997.108-.775.418-1.305.762-1.605-2.665-.305-5.466-1.33-5.466-5.93 0-1.31.468-2.38 1.236-3.22-.123-.305-.534-1.525.117-3.175 0 0 1.008-.322 3.303 1.23a11.49 11.49 0 0 1 3.006-.405c1.02.005 2.047.138 3.006.405 2.295-1.552 3.303-1.23 3.303-1.23.651 1.65.24 2.87.117 3.175.768.84 1.236 1.91 1.236 3.22 0 4.61-2.803 5.62-5.472 5.92.429.37.812 1.102.812 2.222 0 1.606-.014 2.902-.014 3.297 0 .32.192.694.798.577C20.565 21.8 24 17.304 24 12c0-6.627-5.373-12-12-12z"/>
                </svg>
                Entrar com GitHub
            </a>
        </div>
        
        <div class="text-center mt-4">
            <span class="text-gray-600">Não tem uma conta?</span>
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Cadastre-se</a>
        </div>
    </div>
</body>
</html>
