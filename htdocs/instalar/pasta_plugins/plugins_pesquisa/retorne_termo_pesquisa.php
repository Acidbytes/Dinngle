<?php


// retorna o termo de pesquisa -------------------

function retorne_termo_pesquisa(){

return remove_html($_GET['pesquisa_generica']); // retorna o termo de pesquisa

};

// --------------------------------------------------------


?>