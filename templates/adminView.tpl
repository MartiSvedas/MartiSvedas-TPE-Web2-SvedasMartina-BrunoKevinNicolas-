{include file="header.tpl"}
<h1 class="text-center">{$titulo}</h1>
  {foreach from=$users item=user}
<form action="addAdmin" method="post">
<ul class="list-group">
   <p class ="text-center"> {$user->usuario} </p>
   {if $user->admin eq 0 or $user->admin eq null }
    <li class= "text-center" class="list-group-item">
        <button type="button" class=" btn btn-outline-danger"><a class="text-decoration-none" href="deleteUser/{$user->id}">Borrar Usuario</a></button>
        <button type="submit" class=" btn btn-outline-danger" name ="input_id" value="{$user->id}">Hacer Administrador</button>
        <div>
        <input type="hidden" name=input_admin value=1>
        </div>
    </li>
</form>
<form action="submitAdmin" method="post">
   {else}
    <li class= "text-center" class="list-group-item">
        <button type="submit" class=" btn btn-outline-danger" name="input_id" value="{$user->id}">Eliminar Administrador</button>
        <div>
        <input type="hidden" name="input_admin" value=0>
        </div>
    </li>
   {/if}
</form>
</ul>
{/foreach}


{include file="footer.tpl"}
