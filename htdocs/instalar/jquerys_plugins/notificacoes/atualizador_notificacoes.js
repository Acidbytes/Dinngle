

// atualizador notificacao ----------------------------------

function atualizador_notificacoes(){


// atualiza tempo de conexao -----------------------------

atualizar_tempo_conexao_usuario(); // atualiza tempo de conexao

// ----------------------------------------------------------------


// carrega o numero de notificacoes --------------------

carrega_numero_notificacoes(null); // carrega o numero de notificacoes

carrega_numero_notificacoes_add_amigos(5); // carrega o numero de notificacoes

// ----------------------------------------------------------------


};

// ---------------------------------------------------------------




// atualizando notificacao ---------------------------------

timer_notificacao = setInterval(function(){atualizador_notificacoes()}, 15000); // timer atualizador

// ---------------------------------------------------------------




// para o atualizador do notificacao ---------------------

function parar_atualizador_notificacoes(){

clearInterval(timer_notificacao); // para se precisar

};

// ---------------------------------------------------------------




