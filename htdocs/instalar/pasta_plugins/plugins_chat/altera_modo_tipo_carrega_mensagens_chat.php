<?php


// altera tipo de mensagens a carregar do chat ---

function altera_modo_tipo_carrega_mensagens_chat(){


// dados de formulario ----------------------------------

$tipo_mensagem_chat_carregar = remove_html($_POST['tipo_mensagem_chat_carregar']); // tipo de mensagem a carregar

// -------------------------------------------------------------


// atualiza sessao ----------------------------------------

retorne_tipo_mensagem_chat_carregar(true, $tipo_mensagem_chat_carregar); // atualiza sessao

// -------------------------------------------------------------


};

// -------------------------------------------------------------


?>