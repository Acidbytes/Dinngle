
// atualizar usuarios chat online --------------------

function atualizar_chat_usuarios_online(){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/retorne_idamigos_online.php"; // endereco de script

// ----------------------------------------------------------




// monta requisicao -----------------------------------

$.post(endereco_script, {modo_usuarios: 1}, function(retorno){


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


// valida existencia de elemento ---------------------

if ($('#span_usuario_online_chat_' + idamigo).length > 0) {

document.getElementById("span_usuario_online_chat_" + idamigo).style.display = "inline"; // mensagem existe

};

// -----------------------------------------------------------


};

// -----------------------------------------------------------

};

// -----------------------------------------------------------


});

// ----------------------------------------------------------




// monta requisicao -----------------------------------

$.post(endereco_script, {modo_usuarios: 2}, function(retorno){


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


// valida existencia de elemento ---------------------

if ($('#span_usuario_online_chat_' + idamigo).length > 0) {

document.getElementById("span_usuario_online_chat_" + idamigo).style.display = "none"; // mensagem existe

};

// -----------------------------------------------------------


};

// -----------------------------------------------------------

};

// -----------------------------------------------------------


});

// ----------------------------------------------------------








};

// -----------------------------------------------------------
