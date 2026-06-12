```blade
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Minha Carta Pra Você ❤️</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;
            overflow: hidden;

            padding: 20px;

            font-family: Arial, Helvetica, sans-serif;

            background: linear-gradient(
                135deg,
                #cffafe,
                #7dd3fc,
                #38bdf8
            );
        }

        .heart {
            position: absolute;
            bottom: -100px;

            color: rgba(255, 255, 255, 0.8);
            font-size: 24px;

            opacity: 0.7;

            animation: subir linear infinite;
            pointer-events: none;
        }

        @keyframes subir {
            from {
                transform: translateY(0);
                opacity: 0;
            }

            20% {
                opacity: 0.8;
            }

            to {
                transform: translateY(-120vh);
                opacity: 0;
            }
        }

        .login-card {
            width: 90%;
            max-width: 450px;

            position: relative;
            z-index: 10;

            padding: 42px 38px;

            background: rgba(255, 255, 255, 0.9);

            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 35px;

            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.2);

            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .titulo {
            margin-bottom: 16px;

            color: #0e7490;

            font-size: 38px;
            font-weight: 700;
            line-height: 1.15;
            text-align: center;
        }

        .subtitulo {
            margin-bottom: 30px;

            color: #475569;

            font-size: 16px;
            line-height: 1.6;
            text-align: center;
        }

        .mensagem-erro {
            margin-bottom: 20px;
            padding: 12px 15px;

            color: #dc2626;
            background: #fee2e2;

            border-radius: 14px;

            font-size: 15px;
            font-weight: 600;
            text-align: center;
        }

        .formulario {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .campo {
            width: 100%;

            padding: 16px 20px;

            color: #0f172a;
            background: rgba(255, 255, 255, 0.95);

            border: 1px solid #bae6fd;
            border-radius: 999px;
            outline: none;

            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;

            transition: 0.25s;
        }

        .campo::placeholder {
            color: #94a3b8;
        }

        .campo:focus {
            border-color: #22d3ee;

            box-shadow: 0 0 0 4px rgba(34, 211, 238, 0.2);
        }

        .botao {
            width: 100%;

            padding: 16px;

            color: #ffffff;
            background: #0891b2;

            border: none;
            border-radius: 999px;

            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            font-weight: 600;

            cursor: pointer;
            transition: 0.25s;
        }

        .botao:hover {
            background: #0e7490;
            transform: translateY(-2px);

            box-shadow: 0 8px 18px rgba(8, 145, 178, 0.25);
        }

        .botao:active {
            transform: translateY(0);
        }

        .informacoes {
            margin-top: 30px;
            text-align: center;
        }

        .informacoes-principal {
            color: #334155;
            font-size: 16px;
        }

        .informacoes-dica {
            margin-top: 8px;

            color: #64748b;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .login-card {
                width: 100%;
                padding: 32px 22px;
                border-radius: 26px;
            }

            .titulo {
                font-size: 31px;
            }

            .subtitulo {
                margin-bottom: 25px;
                font-size: 15px;
            }

            .campo,
            .botao {
                padding: 14px 17px;
                font-size: 15px;
            }

            .heart {
                font-size: 19px;
            }
        }
    </style>
</head>

<body>

    {{-- Corações animados --}}
    @for($i = 0; $i < 30; $i++)

        <div
            class="heart"
            style="
                left: {{ rand(0, 100) }}%;
                font-size: {{ rand(18, 35) }}px;
                animation-duration: {{ rand(8, 20) }}s;
                animation-delay: -{{ rand(0, 20) }}s;
            "
        >
            🤍
        </div>

    @endfor

    <main class="login-card">

        <h1 class="titulo">
            Minha Carta<br>
            Pra Você ❤️
        </h1>

        <p class="subtitulo">
            Antes de começar, você precisa descobrir as credenciais...
        </p>

        @if(session('erro'))

            <div class="mensagem-erro">
                {{ session('erro') }}
            </div>

        @endif

        <form
            method="POST"
            action="/auth"
            class="formulario"
        >

            @csrf

            <input
                type="text"
                name="usuario"
                placeholder="Usuário"
                autocomplete="username"
                required
                class="campo"
            >

            <input
                type="password"
                name="senha"
                placeholder="Senha"
                autocomplete="current-password"
                required
                class="campo"
            >

            <button
                type="submit"
                class="botao"
            >
                Entrar ❤️
            </button>

        </form>

        <div class="informacoes">

            <p class="informacoes-principal">
                Descubra o usuário e a senha
            </p>

            <p class="informacoes-dica">
                Se quiser dicas, terá que perguntar 😏
            </p>

        </div>

    </main>

</body>
</html>
```
