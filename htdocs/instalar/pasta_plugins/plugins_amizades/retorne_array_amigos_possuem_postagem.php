<?php


// retorna array com idamigos que possuem postagem
function retorne_array_amigos_possuem_postagem($idusuario, $modo_retorno){


// globals
global $tabela_banco;
global $limite_resultados_pagina;


// campos das tabelas
$campo_tabela[0] = $tabela_banco[4].".idamigo";
$campo_tabela[1] = $tabela_banco[4].".idusuario";
$campo_tabela[2] = $tabela_banco[4].".aceitou";
$campo_tabela[3] = $tabela_banco[9].".idusuario";
$campo_tabela[4] = $tabela_banco[9].".conteudo_post";
$campo_tabela[5] = $tabela_banco[9].".id";


// numero da pagina
$numero_pagina = retorne_numero_pagina_resultado(); // numero da pagina


// limit de retorno de dados
$limit_retorno = "order by $campo_tabela[5] desc limit $numero_pagina, $limite_resultados_pagina"; // limit de retorno de dados


// query
$query[0] = "select DISTINCT $campo_tabela[5] from $tabela_banco[4], $tabela_banco[9] where $campo_tabela[1]='$idusuario' and $campo_tabela[2]='2' and $campo_tabela[3] = $campo_tabela[0] and $campo_tabela[4]!='' $limit_retorno;";
$query[1] = "select DISTINCT $campo_tabela[5] from $tabela_banco[4], $tabela_banco[9] where $campo_tabela[1]='$idusuario' and $campo_tabela[2]='2' and $campo_tabela[3] = $campo_tabela[0] and $campo_tabela[4]!='';";


// comando
if($modo_retorno == false){

// retorna o numero de linhas
return retorne_numero_linhas_query($query[1]);

};


// comando
$comando = comando_executa($query[0]);


// contador
$contador = 0;


// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);


// array de retorno
$array_retorno = array();


// obtendo id de amigos que possuem postagens
for($contador == $contador; $contador <= $numero_linhas; $contador++){


// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);


// separa dados
$idamigo = $dados['id'];


// atualiza lista de array de retorno
$array_retorno[] = $idamigo;


};


// retorno
return $array_retorno;


};


?>