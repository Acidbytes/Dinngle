
// curtir social geral ------------------------------------

function curtir_social_geral(id, tipo_curtida, id_real_curtida, idusuario){




// endereco de script ----------------------------------

endereco_script = pasta_acoes + "/curtir.php"; // endereco de script

// -----------------------------------------------------------




// id de divs de retorno ---------------------------------

div_id_1 = "campos_social_publicacoes_gerais_" + id + "_" + tipo_curtida; // id de div

div_id_2 = "id_div_comentario_" + id + "_" + tipo_curtida; // id de div

div_id_3 = "id_div_comentario_" + id_real_curtida + "_" + tipo_curtida; // id de div

// -----------------------------------------------------------




// monta requisicao ------------------------------------

$.post(endereco_script, {id: id, tipo_curtida: tipo_curtida, tipo_comentario: tipo_curtida, idusuario: idusuario}, function(retorno){


// publicacoes ------------------------------------------

if($('#' + div_id_1).length > 0) { 

document.getElementById(div_id_1).innerHTML = retorno; // aplica retorno

};

// ----------------------------------------------------------


});

// -----------------------------------------------------------




// monta requisicao ------------------------------------

$.post(endereco_script, {id: id_real_curtida, tipo_curtida: tipo_curtida, tipo_comentario: tipo_curtida, curtir_social: 1}, function(retorno){


// publicacoes ------------------------------------------

if($('#' + div_id_2).length > 0) { 

document.getElementById(div_id_3).innerHTML = retorno; // aplica retorno

};

// ----------------------------------------------------------


});

// -----------------------------------------------------------




};

// -----------------------------------------------------------
