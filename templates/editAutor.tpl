{include file="header.tpl"}
<h1>{$titulo}</h1>
<div class="container">
    <form action=updateAutor method="POST">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nombre del autor</span>
        <input type="text" name="nombre" placeholder="{$autor->nombre}">
    </div>
    <div class="form-floating"> 
        <textarea class="form-control" placeholder="Descripcion" name="descripcion" id="floatingTextarea2" style="height: 100px" value="{$autor->sinopsis}"></textarea>
        <label for="floatingTextarea2">Descripcion del autor</label>
    </div>
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Genero</span>
        <input type="text" name="genero" placeholder="{$autor->genero}">
    </div>
        <button class="btn btn-dark" type="submit" value="{$autor->id}" name ="id" >Editar</button>
    </form>
</div>
{include file="footer.tpl"}