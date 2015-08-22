
// comenta publicacao ----------------------------------------

function publicar_comentario_publicacao(id, tipo_comentario, idusuario){


// endereco de script ----------------------------------

endereco_script = pasta_acoes + "/comentar.php"; // endereco de script

// -----------------------------------------------------------


// endereco de script ----------------------------------

endereco_script_curtida = pasta_acoes + "/curtir.php"; // endereco de script

// -----------------------------------------------------------


// obtendo valor de comentario -----------------------------

comentario = document.getElementById("campo_input_comentario_publicacao_" + id + "_" + tipo_comentario).value; // comentario

// -------------------------------------------------------------------


// limpa campo --------------------------------------------------

document.getElementById("campo_input_comentario_publicacao_" + id + "_" + tipo_comentario).value = ""; // limpa campo

// -------------------------------------------------------------------


// movendo o foco ----------------------------------------------

document.getElementById("campo_input_comentario_publicacao_" + id + "_" + tipo_comentario).focus; // movendo o foco

// -------------------------------------------------------------------


// salva comentario --------------------------------------------

$.post(endereco_script, {id: id, tipo_comentario: tipo_comentario, comentario: comentario, idusuario: idusuario}, function(retorno){

document.getElementById("campos_social_publicacoes_gerais_" + id + "_" + tipo_comentario).innerHTML = retorno; // aplica retorno

});

// -------------------------------------------------------------------


// monta requisicao ------------------------------------

$.post(endereco_script_curtida, {id: id, tipo_comentario: tipo_comentario}, function(retorno){

document.getElementById("campos_social_publicacoes_gerais_" + id + "_" + tipo_curtida).innerHTML = retorno; // aplica retorno

});

// -----------------------------------------------------------


};

// ------------------------------------------------------------------

