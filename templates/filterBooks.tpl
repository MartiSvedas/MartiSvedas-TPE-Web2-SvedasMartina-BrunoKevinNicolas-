
{include file="header.tpl"}
<div class="container">
<h1 class="text-center">{$titulo} {$autor->nombre}</h1>
<table class="table table-striped">
    <thead>
         <tr>
            <th scope="col">Nombre del libro</th>
            <th scope="col">Sinopsis</th>
        </tr>
    </thead>
    <tbody>
        <tr>
    {foreach from=$libros item=libro}
        {if $libro->id_autor eq  $autor->id }
            <tr> 
                <td> {$libro->nombre} </td>
                <td> {$libro->sinopsis} </td>
            </tr>
        {/if}
    {/foreach}
        </tr>
    </tbody>
</table>
</div>
{include file="footer.tpl"}

