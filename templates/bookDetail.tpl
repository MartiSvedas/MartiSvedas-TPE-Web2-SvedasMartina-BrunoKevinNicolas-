{include file='header.tpl'}
<h1 class="text-center" >{$titulo} "{$libro->nombre}"</h1>
<div id ="libro" libro_id={$libro->id}></div>
<div class="container">
<table class="table table-striped">
    <thead>
         <tr>
            <th scope="col">Sinopsis</th>
            <th scope="col">Autor</th>
            <th scope= "col"></th>
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
        <td>
         {if $libro->imagen != ''}
            <img src="./{$libro->imagen}" class="rounded mx-auto d-block" alt="Responsive image"  >
            {if $admin eq true}
                <div class="col">
                    <a href="deleteImg/{$libro->id}"><button type="button" class="btn btn-outline-danger">Borrar imagen</button></a></li>
                </div>
          {/if}
        {else}
            <p>Sin imagen</p>
            {if $admin eq true}
                <form action="insertImg" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input type="file" name="input_image" id="imageToUpload">
                    </div>
                    <button type="sumbit" value = "{$libro->id}" name="id">Cargar imagen</button>
                </form> 
            {/if}  
        {/if}
        </td>
    </tbody>
</table>          
{include file='templates/vue/commentsVue.tpl'}
<div>
{include file="comments.tpl"}
</div>
<script src="./js/comments.js"></script>
{include file="footer.tpl"}
