const formularios_ajax=document.querySelectorAll(".FormularioAjax");

function enviar_formulario_ajax(e){
    e.preventDefault(); //Ya no te redirecciona a otra parte

    //let crea una variable
    let enviar=confirm("Quieres enviar el formulario");// confirm es la funion que aparece el cuadro de arriba

    if(enviar==true){

        let data= new FormData(this); //formdata crea una red de datos, datos del formulaario
        let method=this.getAttribute("method");
        let action=this.getAttribute("action");

        let encabezados= new Headers();

        let config={
            method: method,
            headers: encabezados,
            mode: 'cors',
            cache: 'no-cache',
            body: data
        };

        fetch(action,config) //api fetch de js
        .then(respuesta => respuesta.text())//"promesa" que convierte l respuesta del archivo en texto plano 
        .then(respuesta =>{ //promesa que muestra la alerta de js
            let contenedor=document.querySelector(".form-rest");
            contenedor.innerHTML = respuesta;
        });
    }

}

//Hace que se ejecute con cada formulacrio de la pagina despies del evento submit
formularios_ajax.forEach(formularios => {
    formularios.addEventListener("submit",enviar_formulario_ajax);
});