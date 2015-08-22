<?php


// retorna se exibe o lembrete -----------

function retorne_exibe_lembrete($dados){


// separando dados ------------------------

$data_lembrete = $dados['data_lembrete']; // dados

// -----------------------------------------------


// data modo lembrete ---------------------

$data_modo_lembrete = "20".date('y')."-".date('m')."-".date('d'); // data modo lembrete

// -----------------------------------------------


// criando datas -----------------------------

$data_1 = $data_lembrete; // data atual

$data_2 = $data_modo_lembrete; // data lembrete

// -----------------------------------------------


// calcula a diferenca entre datas ------

$diferenca_datas = retorne_diferenca_datas($data_1, $data_2); // calcula a diferenca entre datas

// -----------------------------------------------


// verifica tipo de retorno ------------------

if($diferenca_datas >= 0 and $data_lembrete != null){

return true; // sim

}else{

return false; // nao

};

// -----------------------------------------------


};

// ----------------------------------------------


?>