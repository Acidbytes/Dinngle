
// atualiza usuarios novas mensagens ------------

function chat_novas_mensagens(){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/chat_novas_mensagens.php"; // endereco de script

// ----------------------------------------------------------


// monta requisicao -----------------------------------

$.post(endereco_script, {}, function(retorno){


// separando id de usuarios -------------------------

var idusuarios = retorno.split(","); // separando id de usuarios

// -----------------------------------------------------------


// contador -----------------------------------------------

var contador = 0; // contador

// -----------------------------------------------------------


// obtendo ids -------------------------------------------

for(contador == contador; contador <= idusuarios.length; contador++){


// id de usuario amigo ---------------------------------

var idamigo = idusuarios[contador]; // id de usuario amigo

// -----------------------------------------------------------


// valida idamigo ----------------------------------------

if(idamigo.length > 0){

document.getElementById("span_campo_existe_nova_mensagem_" + idamigo).innerHTML = 1; // mensagem existe

}else{

document.getElementById("span_campo_existe_nova_mensagem_" + idamigo).innerHTML = ""; // mensagem nao existe

};

// -----------------------------------------------------------

};

// -----------------------------------------------------------


});

// -----------------------------------------------------------


};

// -----------------------------------------------------------
