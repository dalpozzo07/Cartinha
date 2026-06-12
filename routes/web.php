<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Página Inicial
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/auth');
});

/*
|--------------------------------------------------------------------------
| Tela de Login da Carta
|--------------------------------------------------------------------------
*/

Route::get('/auth', function () {
    return view('journey.welcome');
});

Route::post('/auth', function () {

    $usuario = strtolower(trim(request('usuario')));
    $senha = strtolower(trim(request('senha')));

    if (
        $usuario === 'gigimulamba'
        &&
        $senha === '110417'
    ) {

        session([
            'liberado' => true,
            'fragmento_atual' => 1
        ]);

        return redirect('/fragmento');
    }

    return back()->with('erro', 'Credenciais incorretas ❤️');
});

/*
|--------------------------------------------------------------------------
| Próximo Fragmento
|--------------------------------------------------------------------------
*/

Route::post('/fragmento/proximo', function () {

    session([
        'fragmento_atual' => session('fragmento_atual', 1) + 1
    ]);

    return redirect('/fragmento');
});

/*
|--------------------------------------------------------------------------
| Fragmentos
|--------------------------------------------------------------------------
*/

Route::get('/fragmento', function () {

    if (!session('liberado')) {
        return redirect('/auth');
    }

    $fragmentos = [

        1 => [
            'titulo' => 'Primeira Memória',
            'pergunta' => 'Qual foi a data da primeira vez que fui na frente da sua casa depois que já estávamos juntos?',
            'resposta' => '22/09/2025',
            'imagem' => 'memory1.jpg',
            'descricao' => 'Foi o nosso recomeço, com passos meio dados, mas que estavam formando o nosso amor.'
        ],

        2 => [
            'titulo' => 'Segunda Memória',
            'pergunta' => 'O que a gente comeu no nosso primeiro date oficial?',
            'resposta' => 'sushi',
            'imagem' => 'memory2.jpg',
            'descricao' => 'Depois de tanto tempo me enrolando, finalmente tivemos nosso date oficial.'
        ],

        3 => [
            'titulo' => 'Terceira Memória',
            'pergunta' => 'O seu primeiro buquê era de qual flor?',
            'resposta' => 'rosas',
            'imagem' => 'memory3.jpg',
            'descricao' => 'Foi a primeira vez que dei flores para alguém.'
        ],

        4 => [
            'titulo' => 'Quarta Memória',
            'pergunta' => 'Qual foi nosso primeiro show juntos?',
            'resposta' => 'matue',
            'imagem' => 'memory4.jpg',
            'descricao' => 'Nós mal conhecíamos as músicas, mas foi incrível.'
        ],

        5 => [
            'titulo' => 'Quinta Memória',
            'pergunta' => 'Qual era a cor da minha camisa na sua formatura?',
            'resposta' => 'azul',
            'imagem' => 'memory5.jpg',
            'descricao' => 'Eu estava nervoso conhecendo sua família.'
        ],

        6 => [
            'titulo' => 'Sexta Memória',
            'pergunta' => 'Qual foi o primeiro presente que eu te dei?',
            'resposta' => 'body splash',
            'imagem' => 'memory6.jpg',
            'descricao' => 'Foi um dos presentes que mais gostei de entregar.'
        ],

        7 => [
            'titulo' => 'Sétima Memória',
            'pergunta' => 'Qual foi nosso primeiro date em grupo?',
            'resposta' => 'ijump',
            'imagem' => 'memory7.jpg',
            'descricao' => 'Aquele dia foi muito divertido.'
        ],

        8 => [
            'titulo' => 'Oitava Memória',
            'pergunta' => 'Qual era a cor da primeira rosa que te dei?',
            'resposta' => 'azul',
            'imagem' => 'memory8.jpg',
            'descricao' => 'Eu tinha acabado de sair do quartel.'
        ],

        9 => [
            'titulo' => 'Nona Memória',
            'pergunta' => 'O que você me deu que eu guardo na minha capinha?',
            'resposta' => 'origami',
            'imagem' => 'memory9.jpg',
            'descricao' => 'Vou guardar para sempre.'
        ],

        10 => [
            'titulo' => 'Décima Memória',
            'pergunta' => 'De quem foi a melhor cartinha de aniversário?',
            'resposta' => 'minha',
            'imagem' => 'memory10.jpg',
            'descricao' => 'A sua, obviamente ❤️'
        ],

        11 => [
            'titulo' => 'Décima Primeira Memória',
            'pergunta' => 'Qual foi a legend que eu tirei?',
            'resposta' => 'son',
            'imagem' => 'memory11.jpg',
            'descricao' => 'Só para deixar claro: ela é nossa.'
        ],

    ];

    $id = session('fragmento_atual', 1);

    if ($id > count($fragmentos)) {
        return redirect('/final');
    }

    return view('journey.challenge', [
        'fragmento' => $fragmentos[$id],
        'numero' => $id,
        'total' => count($fragmentos)
    ]);
});

/*
|--------------------------------------------------------------------------
| Carta Final
|--------------------------------------------------------------------------
*/

Route::get('/final', function () {

    if (!session('liberado')) {
        return redirect('/auth');
    }

    return view('journey.final');
});

/*
|--------------------------------------------------------------------------
| Breeze
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';