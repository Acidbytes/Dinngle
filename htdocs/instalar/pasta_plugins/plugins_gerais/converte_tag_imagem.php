<?php

// converte tag imagem para imagem visivel
function converte_tag_imagem($conteudo_post){


// conver url em imagem
$conteudo_post = preg_replace('#(http://([^\s]*)\.(jpg|gif|png))#',  '<a class="fancybox" rel="group" href="$1" target="_blank"><img src="$1" alt="Imagem" class="imagem_convertida_url" /></a>', $conteudo_post);


// conteudo de retorno
$conteudo_post = print_r($conteudo_post, true);


// retorno
if($conteudo_post != 1){

// retorno de conteudo
return $conteudo_post;

}else{

// retorno nulo
return null;

};


};

?>