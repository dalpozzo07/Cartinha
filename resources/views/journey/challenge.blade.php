<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{{ $fragmento['titulo'] }} ❤️</title>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(
        135deg,
        #cffafe,
        #7dd3fc,
        #38bdf8
    );
    overflow:hidden;
    font-family:Arial, Helvetica, sans-serif;
}

.heart{
    position:absolute;
    bottom:-100px;
    animation:subir linear infinite;
    opacity:.25;
}

@keyframes subir{

    from{
        transform:translateY(0);
    }

    to{
        transform:translateY(-120vh);
    }

}

.card{

    width:700px;
    max-width:90%;

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(10px);

    border-radius:35px;

    padding:40px;

    box-shadow:0 20px 40px rgba(0,0,0,.15);

}

.badge{

    display:inline-block;

    background:#dbeafe;

    color:#0369a1;

    padding:10px 20px;

    border-radius:999px;

    font-weight:bold;

}

.progress{

    width:100%;
    height:10px;

    background:#dbeafe;

    border-radius:999px;

    overflow:hidden;

    margin-top:15px;
}

.progress-bar{

    height:100%;

    background:#0891b2;

    transition:1s;
}

.title{

    text-align:center;

    margin-top:20px;

    color:#0f172a;

}

.image-container{

    margin-top:30px;

    display:flex;

    justify-content:center;

}

.image-box{

    width:300px;
    height:300px;

    position:relative;

    overflow:hidden;

    border-radius:30px;

    box-shadow:0 15px 30px rgba(0,0,0,.2);

}

.image-box img{

    width:100%;
    height:100%;

    object-fit:cover;

    transition:3s;

}

.lock{

    position:absolute;

    inset:0;

    display:flex;

    flex-direction:column;

    justify-content:center;

    align-items:center;

    color:white;

}

.lock-icon{

    font-size:90px;

}

.lock-text{

    margin-top:10px;

    font-weight:bold;

    letter-spacing:2px;

}

.question{

    margin-top:35px;

    text-align:center;

    font-size:24px;

    color:#111827;

    line-height:1.5;
}

.input{

    width:100%;

    margin-top:30px;

    padding:16px;

    border:none;

    border-radius:999px;

    text-align:center;

    font-size:18px;

}

.button{

    width:100%;

    margin-top:15px;

    padding:16px;

    border:none;

    border-radius:999px;

    background:#0891b2;

    color:white;

    font-size:18px;

    cursor:pointer;

}

.button:hover{

    background:#0e7490;

}

.success{

    margin-top:25px;

    text-align:center;

}

.success h2{

    color:#0e7490;

    margin-bottom:15px;

}

.description{

    background:#ecfeff;

    padding:20px;

    border-radius:20px;

    color:#334155;

    line-height:1.8;

}

.next-button{

    display:inline-block;

    margin-top:20px;

    padding:15px 30px;

    border-radius:999px;

    color:white;

    text-decoration:none;

    font-weight:bold;
}

</style>

</head>

<body>

@for($i=0;$i<25;$i++)

<div
class="heart"
style="
left:{{ rand(0,100) }}%;
font-size:{{ rand(20,40) }}px;
animation-duration:{{ rand(10,20) }}s;
animation-delay:-{{ rand(0,20) }}s;
"
>
🤍
</div>

@endfor

<div
class="card"

x-data="{
    resposta:'',
    correta:false,

    verificar(){

        if(
            this.resposta.trim().toLowerCase()
            === '{{ strtolower($fragmento['resposta']) }}'
        ){
            this.correta = true
        }else{
            alert('Resposta incorreta ❤️')
        }

    }
}"
>

<div style="text-align:center;">

    <span class="badge">
        Fragmento {{ $numero }} de {{ $total }} ❤️
    </span>

</div>

<div class="progress">

    <div
        class="progress-bar"
        style="width: {{ ($numero / $total) * 100 }}%;"
    ></div>

</div>

<h1 class="title">
    {{ $fragmento['titulo'] }}
</h1>

<div class="image-container">

    <div class="image-box">

        <img
            src="{{ asset('images/'.$fragmento['imagem']) }}"
            :style="correta
            ? 'filter:blur(0px)'
            : 'filter:blur(40px) brightness(.35)'"
        >

        <div
            x-show="!correta"
            class="lock"
        >

            <div class="lock-icon">
                🔒
            </div>

            <div class="lock-text">
                MEMÓRIA BLOQUEADA
            </div>

        </div>

    </div>

</div>

<div class="question">

    {{ $fragmento['pergunta'] }}

</div>

<div x-show="!correta">

    <input
        x-model="resposta"
        class="input"
        placeholder="Digite sua resposta ❤️"
    >

    <button
        class="button"
        @click="verificar()"
    >
        Desbloquear ❤️
    </button>

</div>

<div
    x-show="correta"
    class="success"
>

    <h2>
        Memória Desbloqueada ❤️
    </h2>

    <div class="description">

        {{ $fragmento['descricao'] }}

    </div>

    @if($numero < $total)

        <a
            href="/fragmento/{{ $numero + 1 }}"
            class="next-button"
            style="background:#0891b2;"
        >
            Próximo Fragmento →
        </a>

    @else

        <a
            href="/final"
            class="next-button"
            style="background:#ec4899;"
        >
            Abrir Carta ❤️
        </a>

    @endif

</div>

</div>

</body>
</html>