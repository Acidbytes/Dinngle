
// salva humor de usuraio --------------------------

function salvar_humor_usuario(tipo_humor){


// endereco de script ---------------------------------

endereco_script = pasta_acoes + "/humor_usuario.php"; // endereco de script

// ----------------------------------------------------------


// monta requisicao -----------------------------------

$.post(endereco_script, {tipo_humor: tipo_humor}, function(retorno){


// retorno -------------------------------------------------

document.getElementById("div_exibe_tipo_humor_usuario").innerHTML = retorno; // retorno

// -----------------------------------------------------------


});

// -----------------------------------------------------------


};

// -----------------------------------------------------------
