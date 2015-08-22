<?php

// calcula a idade
function calcula_idade($data_informa){


// retorno
if($data_informa != null){

return diferenca_datas($data_informa, Date("Y-m-d"), 1); // retorna a diferenca

}else{

return null; // retorno nulo

};

};

?>