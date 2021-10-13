<div>
<h2>Agregar Autor</h2>
<form action="createAutor" method="post">
<div class="col-md-6">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nombre Autor</span>
        <input  type="text"  class="form-control" name="nombre"  required>
    </div>
    <div class="input-group mb-3">
        </div>
    <div class="form-floating">  
        <textarea class="form-control" placeholder="Sinopsis" name="descripcion" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Descripcion</label>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Genero</span>
        <input  type="text"  class="form-control" name="genero"  required>
    </div>
    <input type="submit" class="btn btn-primary" value="Agregar autor">
</div>
</form>
</div>