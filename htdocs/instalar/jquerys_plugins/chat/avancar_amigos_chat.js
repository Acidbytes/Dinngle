

// avanca amigos do chat --------------------------

function avancar_amigos_chat(modo_avanco){


// modo de avanco ----------------------------------

switch(modo_avanco){


case 1:
contador_avanco_amigos_chat = contador_avanco_amigos_chat - 2; // retrocede
break;


case 2:
contador_avanco_amigos_chat = contador_avanco_amigos_chat + 1; // avanca
break;


};

// --------------------------------------------------------


// carrega amigos de chat -------------------------

if(contador_avanco_amigos_chat < 0){

contador_avanco_amigos_chat = 0; // zera contador

};

// --------------------------------------------------------


// carrega amigos -----------------------------------

carrega_amigos_chat(); // carrega amigos

// --------------------------------------------------------


};

// --------------------------------------------------------
