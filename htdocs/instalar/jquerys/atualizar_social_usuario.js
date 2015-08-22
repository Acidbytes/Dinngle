
// atualiza social usuario ---------------------------

function atualizar_social_usuario(idusuario, tipo_social){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/atualizar_social_usuario.php"; // endereco de script

// ----------------------------------------------------------


// monta requisicao -----------------------------------

$.post(endereco_script, {idusuario: idusuario, tipo_social: tipo_social}, function(retorno){


// retorno -------------------------------------------------

document.getElementById("div_campo_social_usuario_exibir").innerHTML = retorno; // retorno

// -----------------------------------------------------------


});

// -----------------------------------------------------------


};

// -----------------------------------------------------------
