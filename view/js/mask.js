function mascaraDeTelefone(telefone){
    const textoAtual = telefone.value;
    const isCelular = textoAtual.length === 11;
    let textoAjustado;
        if(isCelular) {
            const parte1 = textoAtual.slice(0,2);
            const parte2 = textoAtual.slice(2,7);
            const parte3 = textoAtual.slice(7,11);
            textoAjustado = `(${parte1})${parte2}-${parte3}` 
        } else if(textoAtual > 0) {
            const parte1 = textoAtual.slice(0,2);
            const parte2 = textoAtual.slice(2,6);
            const parte3 = textoAtual.slice(6,10);
            textoAjustado = `(${parte1})${parte2}-${parte3}`
        }
        else{
            return null;
        }
    telefone.value = textoAjustado;
}
