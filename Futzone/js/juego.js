document.addEventListener("DOMContentLoaded", function(){
    let parrafo = document.querySelector(".resultado");
    let datos = {
        "thing":{
            "equipo":"",
            "goleador":"",
            "boton":""
        }
    }
    let cont = 0;
    let jugadoresazar = [["Rafael Borre","Nacho Scocco","Lucas Pratto"],["Carlos Tevez","Wanchope Ávila","Kichan Pavón"],["Ricky Centurión","Licha López","Matias Donatti"],["Pablo Pérez","Leandro Domingo","Pocho Cerutti"]];
    let arrequiposazar = ["River", "Boca", "Racing", "Independiente"];
    let boton1 = "";
    let boton2 = "";
    let boton3 = "";
    let botonaborrar = "";
    let booleanmostrar = true;   //Para mostrar solo una vez en vez de 3 cuando hacemos la funcion azar
    let ideditar = "";
    let conservarboton = "";
    
    
    mostrartabla();

    document.querySelector("#js-agregarazar").addEventListener("click", agregartablaazar);
    
    function agregartablaazar(){
        if (cont == 0){
            booleanmostrar = false;    //Para que no muestre los 3
            let n1 = Math.floor(Math.random() *4);
            let n2 = Math.floor(Math.random() *4);
            let n3 = Math.floor(Math.random() *4);
            let n4 = Math.floor(Math.random() *3);
            let n5 = Math.floor(Math.random() *3);
            let n6 = Math.floor(Math.random() *3);
            while(n1 == n2){
                n2 = Math.floor(Math.random() *4);
            }
            while((n1 == n3)||(n2 == n3)){
                n3 = Math.floor(Math.random() *4);
            }
            let equipo1 = arrequiposazar[n1];
            let goleador1 = jugadoresazar[n1][n4];
            let equipo2 = arrequiposazar[n2];
            let goleador2 = jugadoresazar[n2][n5];
            let equipo3 = arrequiposazar[n3];
            let goleador3 = jugadoresazar[n3][n6];
            cargartabla(equipo1,goleador1);
            cargartabla(equipo2,goleador2);
            cargartabla(equipo3,goleador3);
            setTimeout(()=>mostrartabla(), 1000);
            setTimeout(function(){booleanmostrar = true;},1250);
            cont = 3;
        }else{
            alert("Primero debe eliminar los anteriores");
        }
    }
    
    
    document.querySelector("#js-cargar").addEventListener("click", cargardatos); 
    
    function cargardatos(){
        let aux1 = document.querySelector("#equipo").value;
        let aux2 = document.querySelector("#goleador").value;
        if ((aux1 != "") && (aux2 != "")){
            cargartabla(aux1,aux2);
        }else{
            alert("Uno de los campos esta vacio");
        }
    }



    async function cargartabla(a1,a2){
        if(cont < 3){
            let url = "https://web-unicen.herokuapp.com/api/groups/10gerardoleandro/futzone";
            datos.thing.equipo = a1;
            datos.thing.goleador = a2;
            parrafo.innerHTML = "Guardando...";
            let botonaponer = "";
            if (boton1 == ""){
                botonaponer = "boton1";
                boton1 = "ocupado";
            }else if(boton2 == ""){
                botonaponer = "boton2";
                boton2 = "ocupado";
            }else if(boton3 == ""){
                botonaponer = "boton3";
                boton3 = "ocupado";
            }
            datos.thing.boton = botonaponer;
            try{
                let response = await fetch(url,{
                    "method":"POST",
                    "headers":{
                        "Content-Type": "application/json"
                    },
                    "body": JSON.stringify(datos)
                });
                parrafo.innerHTML = "Guardado con exito";
                actualizarcontador();
                if (booleanmostrar == true){
                    mostrartabla();
                }
            }
            catch(response){
                parrafo.innerHTML = response
            }
        }else{
            alert("Campos completos");
        }
    }

    
    function cargarboton(id,botonallamar){
        let boton = document.createElement("button");
        boton.innerHTML = "Eliminar";
        boton.setAttribute("data",id);
        boton.addEventListener("click", borrarelemento);
        if(botonallamar == "boton1"){
            boton1 = "ocupado";
            document.querySelector(".boton1").appendChild(boton);
        }else if(botonallamar == "boton2"){
            boton2 = "ocupado";
            document.querySelector(".boton2").appendChild(boton);
        }else if(botonallamar == "boton3"){
            boton3 = "ocupado";
            document.querySelector(".boton3").appendChild(boton);
        }
    }
    

    function mostrarbotones(){
        console.log("BOTON 1: "+boton1);
        console.log("BOTON 2: "+boton2);
        console.log("BOTON 3: "+boton3);
        console.log("CONTADOR: "+cont);
    }
    
    
    async function mostrartabla(){
        let url = "https://web-unicen.herokuapp.com/api/groups/10gerardoleandro/futzone";
        let resultado = document.querySelector("#mostrado");
        try{
            let response = await fetch(url);
            let json = await response.json();
            let html = "";
            for (let i=0; i < json.futzone.length; i++) {
                html += '<tr><th scope="row">' + (i+1) + "</th><td>" + json.futzone[i].thing.equipo + "</td><td>" + json.futzone[i].thing.goleador + "</td><td class='" + json.futzone[i].thing.boton + "'></td></tr>";
                let id = json.futzone[i]._id;
                let botonallamar = json.futzone[i].thing.boton;
                setTimeout(()=>cargarboton(id, botonallamar), 200);
            }
            actualizarcontador();
            setTimeout(()=>mostrarbotones(), 3000);
            resultado.innerHTML = html;
        }
        catch(response){
            parrafo.innerHTML = response
        }
    }

    



    async function actualizarcontador(){
        let url = "https://web-unicen.herokuapp.com/api/groups/10gerardoleandro/futzone";
        try{
            cont = 0;
            let response = await fetch(url);
            let json = await response.json();
            for (let i=0; i < json.futzone.length; i++) {
                cont++;
            }
        }
        catch(response){
            parrafo.innerHTML = response
        }
    }

    async function buscarboton(url){
        try{
            let response = await fetch(url);
            let json = await response.json();
            botonaborrar = json.information.thing.boton;
            console.log("----------BOTON A BORRAR: "+botonaborrar);
        }
        catch(response){
            parrafo.innerHTML = response
        }
    }

    function actualizarboton(){
        if(botonaborrar == "boton1"){
            boton1 = "";
        }else if(botonaborrar == "boton2"){
            boton2 = "";
        }else if(botonaborrar == "boton3"){
            boton3 = "";
        }
    }

    document.querySelector("#js-borrar").addEventListener("click", borrar);
    
    async function borrar(){
        let id = document.querySelector("#borrar").value;
        let url = "https://web-unicen.herokuapp.com/api/groups/10gerardoleandro/futzone/" + id;
        parrafo.innerHTML = "Borrando...";
        buscarboton(url);
        setTimeout(()=>actualizarboton(), 500);
        try{
            let response = await fetch(url,{
                "method":"DELETE"
            });
            parrafo.innerHTML = "Borrado con exito";
            mostrartabla();
        }
        catch(response){
            parrafo.innerHTML = response
        }
    } // Por si tenemos que borrar agregando id

    async function borrarelemento(){
        let id = this.getAttribute("data");
        let url = "https://web-unicen.herokuapp.com/api/groups/10gerardoleandro/futzone/" + id;
        parrafo.innerHTML = "Borrando...";
        buscarboton(url);
        setTimeout(()=>actualizarboton(), 500);
        try{
            let response = await fetch(url,{
                "method":"DELETE"
            });
            parrafo.innerHTML = "Borrado con exito";
            mostrartabla();
        }
        catch(response){
            parrafo.innerHTML = response
        }
    }

    async function buscaridboton(fila){
        let url = "https://web-unicen.herokuapp.com/api/groups/10gerardoleandro/futzone";
        try{
            let response = await fetch(url);
            let json = await response.json();
            ideditar = json.futzone[fila-1]._id;
            conservarboton = json.futzone[fila-1].thing.boton;
        }
        catch(response){
            parrafo.innerHTML = response
        }
    }
    
    document.querySelector("#js-editar").addEventListener("click", editar);
    
    function editar(){
        datos.thing.equipo = document.querySelector("#nuevoequipo").value;
        datos.thing.goleador = document.querySelector("#nuevogoleador").value;
        let fila = parseInt(document.querySelector("#numfila").value,10);
        if ((fila > 0) && (fila <= cont)){
            if((datos.thing.equipo != "") && (datos.thing.goleador != "")){
                buscaridboton(fila);
                setTimeout(()=>editartabla(), 500);
            }else{
                alert("Uno de los campos no esta completo")
            }
        }else{
            alert("La fila no existe");
        }
    }    
    
    
    async function editartabla(){
        let url = "https://web-unicen.herokuapp.com/api/groups/10gerardoleandro/futzone/" + ideditar;
        datos.thing.boton = conservarboton;
        parrafo.innerHTML = "Editando..."
        try{
            let response = await fetch(url,{
                "method":"PUT",
                "headers":{
                    "Content-Type": "application/json"
                },
                "body": JSON.stringify(datos)
            });
            parrafo.innerHTML = "Editado con exito";
            mostrartabla();
        }
        catch(response){
            parrafo.innerHTML = response
        }
    }


    document.querySelector("#inputbuscar").addEventListener("keyup", buscarTabla);
        
    function buscarTabla() {
        let input, table, tr, td, i, txtcomparar;
        input = document.querySelector("#inputbuscar").value.toUpperCase();
        table = document.querySelector("#tablabuscar");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtcomparar = td.innerText;
                if (txtcomparar.toUpperCase().indexOf(input) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            } 
        }
    }

    document.querySelector("#js-enviarjuego").addEventListener("click", function(){
        if (cont == 3){
            alert("Formulario enviado");
        }else{
            alert("Debe haber tres equipos cargados");
        }
    });
})