const formularios_ajax = document.querySelectorAll(".FormularioAjax");

function enviar_formulario_ajax(e) {
    console.log("Evento submit disparado"); // 1. Verificar que el evento submit se esté disparando
    e.preventDefault(); 

    let enviar = confirm("Quieres enviar el formulario");
    console.log("Confirmación: ", enviar); // 2. Verificar que la confirmación se esté mostrando correctamente

    if(enviar == true) {
        let data = new FormData(this); 
        console.log("FormData creado: ", data); // 3. Verificar que el FormData se esté creando correctamente

        let method = this.getAttribute("method");
        console.log("Método: ", method); // 4. Verificar que el método se esté obteniendo correctamente

        let action = this.getAttribute("action");
        console.log("Acción: ", action); // 5. Verificar que la acción se esté obteniendo correctamente

        let encabezados = new Headers();
        console.log("Encabezados: ", encabezados); // 6. Verificar que los encabezados se estén configurando correctamente

        let config = {
            method: method,
            headers: encabezados,
            mode: 'cors',
            cache: 'no-cache',
            body: data
        };
        console.log("Configuración de fetch: ", config); // 7. Verificar que la configuración de fetch sea correcta

        fetch(action, config) 
        .then(respuesta => {
            console.log("Respuesta del servidor: ", respuesta); // 8. Verificar que la respuesta del servidor se esté recibiendo correctamente
            return respuesta.text(); 
        })
        .then(respuesta => { 
            console.log("Respuesta en texto plano: ", respuesta); // 9. Verificar que la respuesta se esté convirtiendo a texto plano correctamente
            let contenedor = document.querySelector(".form-rest");
            contenedor.innerHTML = respuesta;
        });
    }
}

formularios_ajax.forEach(formulario => {
    formulario.addEventListener("submit", enviar_formulario_ajax);
});