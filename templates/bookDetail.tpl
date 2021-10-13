{include file='header.tpl'}
<h1 class="text-center">{$titulo} "{$libro->nombre}"</h1>
<div class="container">
<table class="table table-striped">
    <thead>
         <tr>
            <th scope="col">Sinopsis</th>
            <th scope="col">Autor</th>
        </tr>
    </thead>
    <tbody>
        <td>
           {$libro->sinopsis}
        </td>
        <td>
    {foreach from=$autores item=autor}
            {if $autor->id eq $libro->id_autor}  
                {$autor->nombre}
            {/if}
    {/foreach}
        </td>
    </tbody>
</table>
<div>
{include file="footer.tpl"}