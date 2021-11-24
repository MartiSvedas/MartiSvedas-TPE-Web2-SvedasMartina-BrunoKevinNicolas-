
{literal}
<div id="vue-comments">
    <p style="font-size:25px" ><u>{{ titulo }}</u></p>
    <p style="font-size:15px" >{{ subtitulo }}</p>
     <ul id="comment-list"class="list-group" >
            <li  
                v-for="comment in comments" 
                 :key="comment.id"
                 class="list-group-item"> 
                <div class="row">
                    <div class="col">
                        <button type="button" v-on:click="deleteComment(comment.id)" class="btn btn-outline-danger btn-sm">Borrar</button>
                    </div> 
                </div>   
                <p>{{comment.comentario}}</p>
                <p class="text-muted">puntaje: {{comment.puntaje}}</p>
            </li>
    </ul>
</div>
{/literal}