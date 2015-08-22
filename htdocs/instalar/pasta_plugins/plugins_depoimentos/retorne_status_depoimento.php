<?php


// retorne status de depoimento ------------------

function retorne_status_depoimento($dados){


// obtendo valor de tabela --------------------------

$aceitou = $dados['aceitou']; // obtendo valor de tabela

// ---------------------------------------------------------


// tipo de retorno -------------------------------------

if($aceitou == null){

return 1; // adicionar

}else{

return $aceitou; // tipo de retorno

};

// ---------------------------------------------------------


};

// --------------------------------------------------------


?>