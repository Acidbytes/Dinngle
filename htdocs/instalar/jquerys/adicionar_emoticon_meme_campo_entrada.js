

// adiciona emoticon e meme em campo de entrada -----------

function adicionar_emoticon_meme_campo_entrada(contador){


// codigo de emoticon ----------------------------------

var codigo_emoticon = " s(" + contador + ")"; // codigo de emoticon

// --------------------------------------------------------------




// adiciona meme emoticon chat -------------------

if($( "#campo_input_chat").length){


// adiciona meme emoticon --------------------------

document.getElementById("campo_input_chat").value = document.getElementById("campo_input_chat").value + codigo_emoticon; // adiciona meme emoticon

// --------------------------------------------------------------


// move o foco
document.getElementById("campo_input_chat").focus(); // move o foco


};

// --------------------------------------------------------------




};

// ----------------------------------------------------------------

