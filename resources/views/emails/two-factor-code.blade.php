<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código de Verificação</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #4A90E2;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 600;
        }

        .content {
            padding: 30px 20px;
            color: #4a4a4a;
            text-align: center;
        }

        .content p {
            font-size: 1rem;
            margin: 10px 0;
        }

        .verification-code {
            font-size: 2.5rem;
            font-weight: 600;
            color: #4A90E2;
            background-color: #f0f7ff;
            padding: 15px 0;
            margin: 20px 0;
            border-radius: 8px;
            letter-spacing: 0.1rem;
        }

        .footer {
            background-color: #f4f4f9;
            color: #9b9b9b;
            padding: 15px 20px;
            font-size: 0.8rem;
            text-align: center;
        }

        .footer a {
            color: #4A90E2;
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Seu Código de Verificação</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Para concluir seu login, insira o código abaixo no sistema:</p>
            <div class="verification-code">{{ $code }}</div>
            <p>O código é válido por <strong>10 minutos</strong>.</p>
            <p>Se você não solicitou este código, ignore este e-mail.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© {{ date('Y') }} {{ config('app.name') }}. Todos os direitos reservados.</p>
            <p>
                <a href="{{ config('app.url') }}">Visite nosso site</a>
            </p>
        </div>
    </div>
</body>
</html>
