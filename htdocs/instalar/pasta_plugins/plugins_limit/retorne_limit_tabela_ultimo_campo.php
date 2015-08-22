<?php


// limit de dados de ultimo campo da tabela ---

function retorne_limit_tabela_ultimo_campo(){


// limit de retorno de dados -----------------------

$limit_retorno = "order by id desc limit 0, 1"; // limit de retorno de dados

// --------------------------------------------------------


// retorno ----------------------------------------------

return $limit_retorno; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>