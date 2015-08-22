
// carrega sessao anterior de chat ----------------

function carregar_sessao_chat_anterior(){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/carregar_sessao_chat_anterior.php"; // endereco de script

// ----------------------------------------------------------


// monta requisicao -----------------------------------

$.post(endereco_script, {}, function(retorno){


// id de usuario -----------------------------------------

idusuario = retorno; // id de usuario

// -----------------------------------------------------------


// abre a janela de chat -------------------------------

if(retorno.length > 0){

constroe_campo_conversa_chat(idusuario); // abre a janela de chat

};

// -----------------------------------------------------------


});

// -----------------------------------------------------------


};

// -----------------------------------------------------------
