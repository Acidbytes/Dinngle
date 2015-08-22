<?php


// retorna se exibe o evento --------------

function retorne_exibe_evento($dados){


// separando dados ------------------------

$data_evento = $dados['data_evento']; // dados

// -----------------------------------------------


// data modo evento -----------------------

$data_modo_evento = "20".date('y')."-".date('m')."-".date('d'); // data modo evento

// -----------------------------------------------


// criando datas -----------------------------

$data_1 = $data_evento; // data atual

$data_2 = $data_modo_evento; // data evento

// -----------------------------------------------


// calcula a diferenca entre datas ------

$diferenca_datas = retorne_diferenca_datas($data_1, $data_2); // calcula a diferenca entre datas

// -----------------------------------------------


// verifica tipo de retorno ------------------

if($diferenca_datas >= 0 and $data_evento != null){

return true; // sim

}else{

return false; // nao

};

// -----------------------------------------------


};

// ----------------------------------------------


?>