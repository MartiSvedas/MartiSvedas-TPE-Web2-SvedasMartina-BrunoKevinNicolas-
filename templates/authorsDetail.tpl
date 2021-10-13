{include file="header.tpl"}
<h1 class="text-center">{$titulo}</h1>
<div class="container">
    <table class="table">
            <thead>     
                <tr>  
                    <th scope="col">id</th> 
                    <th scope="col">Nombre</th>      
                    <th scope="col">Descripcion</th>  
                    <th scope="col">Genero</th>   
                    <th scope="col">Libros del autor</th> 
                    {if $user eq true}
                    <th scope="col">Eliminar</th>      
                    <th scope="col">Editar</th>
                    {/if}          
                </tr>
            </thead>
{foreach from=$autores item=autor }
            <tbody>
                <tr>
                    <th scope="row">{$autor->id}</th>
                    <td>
                    {$autor->nombre}
                   </td>
                    <td>{$autor->descripcion}</td>
                    <td>{$autor->genero}</td>
                    <div class="hstack gap-3">
                    <td><button type="button" class=" btn btn-outline-primary"><a href="filtrarBook/{$autor->id}" class="text-decoration-none">Ver Libros</a></button>
                    </td>
                    {if $user eq true}
                    <td>
                        <button type="button" class=" btn btn-outline-danger"><a class="text-decoration-none" href="deleteAutor/{$autor->id}">Borrar</a></button>
                    </td>
                    <td>
                        <button type="button" class=" btn btn-outline-secondary"><a class="text-decoration-none" href="editAutor/{$autor->id}">Editar</a></button>
                    </td>
                    {/if}
                    </div>
                </tr>
            </tbody>
{/foreach}
    </table>
<div>
{if $user eq true}
{include file="insertAutor.tpl"}
{/if}
