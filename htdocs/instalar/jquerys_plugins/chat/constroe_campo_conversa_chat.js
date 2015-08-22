
// constroe o campo de conversa -----------------

function constroe_campo_conversa_chat(idusuario){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/constroe_campo_conversa_chat.php"; // endereco de script

// ----------------------------------------------------------


// id de usuario utilizando atual --------------------

idusuario_chat_utilizando_atual = idusuario; // id de usuario utilizando

// ----------------------------------------------------------


// exibe janela de chat ------------------------------

document.getElementById("div_chat_usuarios_disponiveis").style.display = "inline"; // exibe

// ------------------------------------------------------------


// monta requisicao -----------------------------------

$.post(endereco_script, {idusuario: idusuario}, function(retorno){


// retorno -------------------------------------------------

document.getElementById("div_lista_amigos_chat_usuario").innerHTML = retorno; // retorno

// -----------------------------------------------------------


// move o foco -------------------------------------------

document.getElementById("campo_input_chat").focus(); // move o foco

// -----------------------------------------------------------


});

// -----------------------------------------------------------


};

// -----------------------------------------------------------
