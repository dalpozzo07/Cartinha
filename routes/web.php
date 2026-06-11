<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () {
    return view('journey.challenge');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/fragmento/{id}', function ($id) {

    $fragmentos = [

        1 => [
            'titulo' => 'Primeira Memória',
            'pergunta' => 'Qual foi a data da primeira vez que fui na frente da sua casa depois que já estávamos juntos?',
            'resposta' => '22/09/2025',
            'imagem' => 'memory1.jpg',
            'descricao' => 'Foi o nosso recomeço, com passos meio dados, mas que estava formando o nosso amor e carinho'
        ],

        2 => [
            'titulo' => 'Segunda Memória',
            'pergunta' => 'Oque a gente comeu no nosso primero date oficial de todos?',
            'resposta' => 'sushi',
            'imagem' => 'memory2.jpg',
            'descricao' => 'Depois de tanto tempo me enrolando, finalmente a gente conseguiu sair para um date oficial,
            e foi tão gostoso quanto o sushi que a gente comeu.'
        ],

        3 => [
            'titulo' => 'Terceira Memória',
            'pergunta' => 'O seu primeiro buquê, era de qual flor?',
            'resposta' => 'rosas',
            'imagem' => 'memory3.jpg',
            'descricao' => 'Foi a primeira vez que eu dei flores para alguém, e eu sabia que ali tava sendo construido algo diferente de tudo
            .'
        ],

        4 => [
            'titulo' => 'Quarta Memória',
            'pergunta' => 'Qual foi nosso primeiro show juntos?',
            'resposta' => 'matue',
            'imagem' => 'memory4.jpg',
            'descricao' => 'Os dois conheciam 2 musicas no máximo, mas com certeza eu me senti a pessoa mais incrivel do seu lado aquele dia.'
        ],

        5 => [
            'titulo' => 'Quinta Memória',
            'pergunta' => 'Eu tava usando qual cor de camisa no dia da sua formatura?',
            'resposta' => 'azul',
            'imagem' => 'memory5.jpg',
            'descricao' => 'Eu quase me caguei nas calças tendo que conversar com seu pai, apesar de você ficar soltinha a festa toda foi incrivel.'
        ],

        6 => [
            'titulo' => 'Sexta Memória',
            'pergunta' => 'Qual foi o primeiro presente que eu te dei?',
            'resposta' => 'body splash',
            'imagem' => 'memory6.jpg',
            'descricao' => 'Era um dinheirinho guardado e contado, mas foi o meu maior prazer te dar o que você queria.'
        ],

        7 => [
            'titulo' => 'Sétima Memória',
            'pergunta' => 'Qual foi nosso primeiro date em amigos ( lugar )?',
            'resposta' => 'ijump',
            'imagem' => 'memory7.jpg',
            'descricao' => 'Foi muiiito bom, e engraçado aquele dia a gente se divertiu bastante.'
        ],

        8 => [
            'titulo' => 'Oitava Memória',
            'pergunta' => 'Teve uma rosa que eu te dei, a primeira delas, qual cor era?',
            'resposta' => 'azul',
            'imagem' => 'memory8.jpg',
            'descricao' => 'Eu tava me apresetando do quartel, e tinha recem saido desse mesmo emprego que eu to agora, 
            e tinha recebido, não pensei duas vezes para te dar a rosa, e foi tão bom te ver feliz com ela.'
        ],

        9 => [
            'titulo' => 'Nona Memória',
            'pergunta' => 'Tem algo que você me deu e eu sempre guardo na minha capinha, o que é?',
            'resposta' => 'origami',
            'imagem' => 'memory9.jpg',
            'descricao' => 'Vou guardar para o todo sempre.'
        ],

        10 => [
            'titulo' => 'Décima Memória',
            'pergunta' => 'De quem foi a melhor cartinha de aniversário?',
            'resposta' => 'Minha',
            'imagem' => 'memory10.jpg',
            'descricao' => 'óbvio que foi a sua né, não teve nem como disputar.'
        ],

        11 => [
            'titulo' => 'Décima Primeira Memória',
            'pergunta' => 'Qual foi a legend que eu tirei?',
            'resposta' => 'son',
            'imagem' => 'memory11.jpg',
            'descricao' => 'Só pra deixar claro, é nossa...'
        ],
    ];

    abort_if(!isset($fragmentos[$id]), 404);

    return view('journey.challenge', [
        'fragmento' => $fragmentos[$id],
        'numero' => $id,
        'total' => count($fragmentos)
    ]);

});

Route::get('/final', function () {
    return view('journey.final');
});