<div class="container">
<h2>Agregar Libro</h2>
<form action="createBook" method="post">
<div class="col-md-6">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nombre del libro</span>
        <input  type="text"  class="form-control" name="nombre"  required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Autor</span>
        <select class="form-select form-select-sm" name=autor>
    {foreach from=$autores item=autor}
        <option value="{$autor->id}"> {$autor->nombre}</option>
    {/foreach}
        </select>
    </div>
    <div class="form-floating">  
        <textarea class="form-control" placeholder="Sinopsis" name="sinopsis" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Breve sinopsis del libro</label>
    </div>
    <input type="submit" class="btn btn-primary" value="Agregar libro">
</div>
</form>
</div>

