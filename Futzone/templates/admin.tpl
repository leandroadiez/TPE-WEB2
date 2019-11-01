{include file="header.tpl"}
    <hr class="margenhr bg-success">
    <h1 class="text-center">Administrador</h1>
    <br>
    <h1 class="text-center">Editar Borrar Ligas</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Liga</th>
                <th scope="col">Pais</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$ligas item=liga}
                <tr>
                    <td>{$liga['nombre']}</td>
                    <td>{$liga['pais']}</td>
                    <td><a class="btn btn-outline-secondary" href="mostrarEditarLiga/{$liga['id_liga']}" role="button">EDITAR</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    <h1 class="text-center">Agregar Liga</h1>
    <form method="post" action="agregarLiga">
        <div class="form-group">
            <label>Nombre</label>
            <input type="input" class="form-control" name="ligaId" id="ligaId" placeholder="Supercopa">
        </div>
        <div class="form-group">
            <label>Pais</label>
            <input type="input" class="form-control" name="paisId" id="paisId" placeholder="Argentina">
        </div>
        <br>
        <button type="submit" class="btn bg-dark btn-dark">Listo</button>
    </form>
    
{include file="footer.tpl"}