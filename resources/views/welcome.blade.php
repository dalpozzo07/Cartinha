<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Carta Pra Você ❤️</title>

    @vite(['resources/css/app.css'])

    <style>
        body{
            overflow:hidden;
        }

        .heart{
            position:absolute;
            bottom:-100px;
            font-size:24px;
            animation: subir linear infinite;
            opacity:.7;
        }

        @keyframes subir{
            from{
                transform:translateY(0);
                opacity:0;
            }

            20%{
                opacity:.8;
            }

            to{
                transform:translateY(-120vh);
                opacity:0;
            }
        }
    </style>
</head>

<body class="bg-pink-200 min-h-screen flex items-center justify-center relative">

    {{-- CORAÇÕES --}}
    @for($i = 0; $i < 25; $i++)
        <div
            class="heart"
            style="
                left: {{ rand(0,100) }}%;
                animation-duration: {{ rand(8,20) }}s;
                animation-delay: -{{ rand(0,20) }}s;
            "
        >
            ❤️
        </div>
    @endfor

    {{-- CARD LOGIN --}}
    <div
        class="relative z-10 bg-white/90 backdrop-blur-sm rounded-[35px] shadow-2xl p-10 w-[90%] max-w-md"
    >

        <h1
            class="text-center text-4xl font-bold text-pink-600 mb-8"
        >
            Minha Carta<br>Pra Você ❤️
        </h1>

        <form class="space-y-5">

            <input
                type="text"
                placeholder="Usuário"
                class="w-full p-4 rounded-full border border-pink-200 focus:outline-none focus:ring-2 focus:ring-pink-400"
            >

            <input
                type="password"
                placeholder="Senha"
                class="w-full p-4 rounded-full border border-pink-200 focus:outline-none focus:ring-2 focus:ring-pink-400"
            >

            <button
                type="submit"
                class="w-full bg-pink-500 hover:bg-pink-600 text-white py-4 rounded-full font-semibold transition"
            >
                Entrar ❤️
            </button>

        </form>

        <div class="text-center mt-8">

            <p class="text-gray-700">
                Descubra o usuário e a senha
            </p>

            <p class="text-gray-500 text-sm mt-2">
                Se quiser dicas, tem que perguntar 😏
            </p>

        </div>

    </div>

</body>
</html>