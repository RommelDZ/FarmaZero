<section class="row clearfix">
  <div class="col-md-12 column">
    <div class="row clearfix frm-header">
      <div class="col-md-10 column">
        <h3>
          Listado de Usuarios
        </h3>
      </div>
      <div class="col-md-2 column btn-new">
        <a href="<?= base_url() ?>registra_usuarios" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Nuevo Usuario</a>
      </div>
    </div>
    <hr />
    <div class="row clearfix">  
      <div class="col-md-12 column table-responsive">
        <table id="tblDatos" class="table hover order-column table-striped">
          <thead>
            <tr>
              <th>Código</th>
              <th>Nick Usuario</th>
              <th>Nombre(s) Apellido(s)</th>
              <th>Fecha Registro</th>
              <th>Tipo Usuario</th>
              <th>Estado</th>
              <th></th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>Código</th>
              <th>Nick Usuario</th>
              <th>Nombre(s) Apellido(s)</th>
              <th>Fecha Registro</th>
              <th>Tipo Usuario</th>
              <th>Estado</th>
              <th></th>
            </tr>
          </tfoot>
          
          <tbody>
          <?php  $i = 1; foreach ($listado as $usuario):?>
            <tr>
              <td><?= $usuario->id_usuario ?></td>
              <td><?= $usuario->nick_usuario ?></td>
              <td><?= $usuario->nombre_usuario ?></td>
              <td data-order="<?= $usuario->fecharegistro_usuario ?>"><?= date("d/m/Y H:i:s",strtotime($usuario->fecharegistro_usuario)) ?></td>
              <td><?= $usuario->nombre_tipousuario ?></td>
              <td><?php if($usuario->estado_usuario == 0){echo "INACTIVO";} else {echo "ACTIVO";} ?></td>
              <td><a href="<?= base_url() ?>modifica_usuarios/<?= $usuario->id_usuario ?>" class="btn btn-success" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
            </tr>
          <?php $i++; endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>