    <form id="form-comment">
    <div class="form-floating">
        <textarea class="form-control" placeholder="Comentario"  id="input_comentario" style="height: 100px"></textarea>
        <label for="floatingTextarea" > Inserte comentario</label>
        <div id="user" id_user = {$user}></div>
        <div id="admin" admin = {$admin}></div>
    </div>
    <div class="form-group">
        <select class="form-select" aria-label="Default select example" id="input_puntaje">
            <option selected>Agregue un puntaje</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
  </div>
        <button class="btn btn-primary" type="submit" >Agregar Comentario</button>
</form>

  