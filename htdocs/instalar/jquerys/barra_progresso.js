
// exibe barra de progresso -----------------------

function barra_progresso(tipo_barra){


// analisando tipo de barra ------------------------

switch(tipo_barra){


case 1:
document.getElementById("barra_progresso_postagem_conteudo").style.display = "block"; // exibe div
break;


case 2:
document.getElementById("barra_progresso_upload_imagens_album").style.display = "block"; // exibe div
break;


case 3:
document.getElementById("barra_progresso_upload_imagem_perfil").style.display = "block"; // exibe div
break;


case 4:
document.getElementById("barra_progresso_upload_imagem_fundo").style.display = "block"; // exibe div
break;


case 5:
document.getElementById("barra_progresso_upload_musica_usuario").style.display = "block"; // exibe div
break;


};

// --------------------------------------------------------


};

// --------------------------------------------------------
