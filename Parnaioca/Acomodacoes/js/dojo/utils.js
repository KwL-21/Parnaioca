function ajax(url,divId) {

    dojo.io.bind({
    url: url,
    handle: function(status, data){ 
        if(status == "load"){
            myDiv = document.getElementById(divId);
            myDiv.innerHTML = data;
        }else if(status == "error"){
            alert('Erro ao recuperar os resultados');
        }else{
            alert('Tipo de resposta desconhecido: ' + status);
        }        
    },
    mimetype: "text/html",
    ransport: "XMLHTTPTransport"
});
}
