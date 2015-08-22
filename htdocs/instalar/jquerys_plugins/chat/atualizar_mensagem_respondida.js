
// atualizar mensagem respondida ----------------

function atualizar_mensagem_respondida(){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/retorne_mensagem_nova.php"; // endereco de script

// ----------------------------------------------------------


// valida idusuario chat utilizando atual ----------

if(idusuario_chat_utilizando_atual == null){

return false; // retorno falso

};

// ----------------------------------------------------------


// monta requisicao -----------------------------------

$.post(endereco_script, {idusuario: idusuario_chat_utilizando_atual}, function(retorno){


// nao ha mensagem nova --------------------------

document.getElementById("span_campo_existe_nova_mensagem_" + idusuario_chat_utilizando_atual).innerHTML = retorno; // nao ha mensagem nova

// ----------------------------------------------------------


});

// ----------------------------------------------------------


};

// ----------------------------------------------------------

