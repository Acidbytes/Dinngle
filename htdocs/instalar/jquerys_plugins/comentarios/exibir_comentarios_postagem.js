
// exibir comentarios social --------------------------

function exibir_comentarios_postagem(id, tipo_comentario, tipo_pagina){


// endereco de script ----------------------------------

endereco_script = pasta_acoes + "/comentarios.php"; // endereco de script

// -----------------------------------------------------------


// calcula numero de pagina -------------------------

numero_pagina = document.getElementById("span_conta_avanco_comentario_" + id + "_" + tipo_comentario).innerHTML; // contador de avanco
numero_pagina = parseInt(numero_pagina); // converte para inteiro
numero_pagina_atual = numero_pagina; // pagina atual
numero_pagina += numero_avancos_comentarios; // incrementa

// -----------------------------------------------------------


// span contador de avanco --------------------------

document.getElementById("span_conta_avanco_comentario_" + id + "_" + tipo_comentario).innerHTML = numero_pagina; // atualiza contador na span

// -----------------------------------------------------------


// monta requisicao ------------------------------------

$.post(endereco_script, {id: id, tipo_comentario: tipo_comentario, numero_pagina: numero_pagina_atual, tipo_pagina: tipo_pagina}, function(retorno){


// verifica se retorno e diferente de nulo -----

if(!retorno){

return false; // retorno falso

};

// ------------------------------------------------------


// obtem e atualiza comentarios ---------------

if(numero_pagina > numero_avancos_comentarios){


comentarios_atual = document.getElementById("div_comentarios_usuarios_exibir_" + id + "_" + tipo_comentario).innerHTML; // comentarios atual

document.getElementById("div_comentarios_usuarios_exibir_" + id + "_" + tipo_comentario).innerHTML = comentarios_atual + retorno; // aplica retorno


}else{


comentarios_atual = ""; // comentarios atual

document.getElementById("div_comentarios_usuarios_exibir_" + id + "_" + tipo_comentario).innerHTML = comentarios_atual + retorno; // aplica retorno


};

// ------------------------------------------------------


});

// -----------------------------------------------------------


};

// -----------------------------------------------------------
