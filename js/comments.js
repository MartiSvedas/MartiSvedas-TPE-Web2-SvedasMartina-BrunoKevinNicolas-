"use strict"
const API_URL='http://localhost/WEB2/TPEspecial/api/comentarios/' ;
const libro = document.querySelector('#libro').getAttribute("libro_id");
const user = document.querySelector('#user').getAttribute("id_user");
const admin = document.querySelector('#admin').getAttribute("admin");

let app = new Vue({
    el: '#vue-comments',
    data: {
        titulo : "Comentarios",
        subtitulo :"",
        comments: "", 
    }
});

document.addEventListener('DOMContentLoaded', function(){
    ShowComments();
})

document.querySelector('#form-comment').addEventListener('submit', function (e) {
    e.preventDefault();
    if (user!="") {
        InsertComment(user);
    }
    })

async function ShowComments() {
    try {
        let response = await fetch(API_URL + libro);
        if(response.status==200){
        let comentarios = await response.json();
            app.comments = comentarios;
        }
        else{
            app.subtitulo = "El libro no tiene comentarios";
        }
    } catch (e) {
        console.log(e);
    }
}

        
async function deleteComment(comment){
if(admin == true){
    try{
        let response = await fetch (API_URL + comment, {
            method:"DELETE"
        });
         if(response.status==200){
            app.subtitulo = "Borrado";
            app.comments = ShowComments() ;
    }
        else{
            app.subtitulo = "El comentario no se pudo agregar";}
        }
        catch(error){
            console.log(error)}
    }
    else{
        app.subtitulo="Debe ser administrador para borrar un comentario"
    }
}

async function InsertComment(user){
    let comment= {
        id_user: user,
        comentario: document.querySelector('#input_comentario').value,
        puntaje: document.querySelector('#input_puntaje').value,
        id_libro: libro,
    }
    try {
        let response = await fetch(API_URL , {
            method: "POST",
            headers: { "Content-type": "application/json" },
            body: JSON.stringify(comment)
        });
        if (response.status == 200) {
            app.subtitulo = "Comentario Agregado";
            app.comments = ShowComments() ;
        }
        else{
            app.subtitulo="El comentario no se pudo agregar"
        }
    }
    catch (error) {
        console.log("error")
    }
}





