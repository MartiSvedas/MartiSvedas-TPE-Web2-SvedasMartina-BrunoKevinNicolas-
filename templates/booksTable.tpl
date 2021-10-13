
  {include file="header.tpl"}
   <div class="container">
   {if $user eq true}
        <button type="button" class="btn btn-default"><a class="text-decoration-none" href="logout">Cerrar sesion</a></button>
    {/if}
        <h1 class="text-center">{$titulo}</h1>
        <table class="table">
            <thead>     
                <tr>  
                    <th scope="col">id</th> 
                    <th scope="col">Nombre del libro</th>      
                    <th scope="col">Autor</th>
                    <th scope="col">Detalles</th> 
                    {if $user eq true}
                    <th scope="col">Eliminar</th>      
                    <th scope="col">Editar</th> 
                    {/if}     
                </tr>
            </thead>
            <tbody>
        {foreach from=$libros item=libro}
                <tr>
                    <th scope="row">
                    {$libro->id} 
                    </th>
                    <td>{$libro->nombre}</td>
                    <td>  
                {foreach from=$autores item=autor}
                    {if $autor->id eq $libro->id_autor}  
                    {$autor->nombre}
                    {/if}
                {/foreach}
                    </td>
                    <div class="hstack gap-3">
                    <td>
                    <button type="button" class=" btn btn-outline-primary"><a class="text-decoration-none" href="showBook/{$libro->id}">Descripcion</a></button>
                    </td>
                    <td>
                    {if $user eq true}
                    <button type="button" class=" btn btn-outline-danger"><a class="text-decoration-none" href="deleteBook/{$libro->id}">Borrar</a></button>
                    </td>
                    <td>
                    <button type="button" class=" btn btn-outline-secondary"><a class="text-decoration-none" href="editBook/{$libro->id}">Editar</a></button>
                    </td>
                    {/if}
                    </div>
                </tr>
        {/foreach}
            </tbody>
        </table>
    </div>
{if $user eq true}
{include file="insertBook.tpl"}
{/if}
{include file="footer.tpl"}
</body>
</html>