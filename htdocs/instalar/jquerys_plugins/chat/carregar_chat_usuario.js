
// carrega o chat de usuario -------------------------

function carregar_chat_usuario(){


// exibe div ---------------------------------------------

document.getElementById("div_chat_usuarios_disponiveis").style.display = "none"; // exibindo div

// ---------------------------------------------------------


// carrega usuarios disponiveis -------------------

carrega_amigos_chat(); // carrega usuarios disponiveis

// ---------------------------------------------------------


};

// ---------------------------------------------------------


// ativa timers ------------------------------------------

timer_atualizador_conversa = setInterval(function(){atualizador_chat()}, 1000); // timer atualizador

timer_chat_notificacoes = setInterval(function(){atualizador_chat_notificacoes()}, 5000); // timer atualizador

// ---------------------------------------------------------


