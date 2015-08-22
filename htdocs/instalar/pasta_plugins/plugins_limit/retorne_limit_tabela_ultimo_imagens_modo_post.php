<?php


// limit de dados de ultimo campo da tabela ---

function retorne_limit_tabela_ultimo_imagens_modo_post(){


// limit de retorno de dados -----------------------

$limit_retorno = "order by id desc limit 0, 6"; // limit de retorno de dados

// --------------------------------------------------------


// retorno ----------------------------------------------

return $limit_retorno; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>