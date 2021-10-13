{include file="header.tpl"}
<div class="container">
<h1>{$titulo}</h1>
<form action="registerUser" method="post">
<div class="col-md-6">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Usuario</span>
        <input  type="text"  class="form-control" name="user"  required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">password</span>
        <input  type="password"  class="form-control" name="password"  required>
    </div>
</div>
    <input type="submit" class="btn btn-primary" value="Crear Cuenta">
</form>
</div>
{include file="footer.tpl"}