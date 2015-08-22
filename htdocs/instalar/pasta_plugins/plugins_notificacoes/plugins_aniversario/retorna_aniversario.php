<?php


// retorna se faz aniversario -----------------------

function retorna_aniversario($idusuario){


// dados do usuario ----------------------------------

$dados_usuario = retorna_dados_usuario_array($idusuario); // dados do usuario

// ----------------------------------------------------------


// data de nascimento --------------------------------

$data_nascimento = $dados_usuario['data_nascimento']; // data de nascimento

// ----------------------------------------------------------


// separando data -------------------------------------

$separa_data = explode("-", $data_nascimento); // separando data

// ----------------------------------------------------------


// dia -----------------------------------------------------

$dia_usuario = $separa_data[2]; // dia

if($dia_usuario <= 9){

$dia_usuario = str_replace("0", null, $dia_usuario);

};

// ----------------------------------------------------------


// mes ---------------------------------------------------

$mes_usuario = $separa_data[1]; // mes

if($mes_usuario <= 9){

$mes_usuario = str_replace("0", null, $mes_usuario);

};

// ----------------------------------------------------------


// retorna se e aniversario -------------------------

if($dia_usuario == retorne_dia_atual() and $mes_usuario == retorne_mes_atual()){

return true; // sim

}else{

return false; // nao


};

// ----------------------------------------------------------


};

// --------------------------------------------------------


?>