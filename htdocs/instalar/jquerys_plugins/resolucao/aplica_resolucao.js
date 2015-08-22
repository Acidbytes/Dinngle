
// aplica resolucao 
function aplica_resolucao(){


// endereco de script 
endereco_script = pasta_acoes + "/resolucao.php"; // endereco de script


// largura
var largura = window.screen.width;


// monta requisicao
$.post(endereco_script, {largura: largura}, function(retorno){



});

};

