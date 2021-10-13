
{include file="header.tpl"}
<h1>{$titulo}</h1>
<div class="container">
    <form action=updateBook method="POST">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nombre del libro</span>
        <input type="text" name="nombre" placeholder="{$libro->nombre}">
    </div>
    <div class="form-floating"> 
        <textarea class="form-control" placeholder="Sinopsis" name="sinopsis" id="floatingTextarea2" style="height: 100px" value="{$libro->sinopsis}"></textarea>
        <label for="floatingTextarea2">Breve sinopsis del libro</label>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Autor</span>
        <select class="form-select form-select-sm"  name=autor >
    {foreach from=$autores item=autor}
            <option value="{$autor->id}" >{$autor->nombre}</option>
    {/foreach}
        </select>
    </div>
        <button class="btn btn-dark" type="submit" value="{$libro->id}" name ="id" >Editar</button>
    </form>
</div>
{include file="footer.tpl"}
 