<section class="row clearfix">
  <div class="col-md-12 column">
    <div class="row clearfix frm-header">
      <div class="col-md-10 column">
        <h3>
          Listado de Clientes
        </h3>
      </div>
      <div class="col-md-2 column btn-new">
        <a href="<?= base_url() ?>registra_clientes" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Nuevo Cliente</a>
      </div>
    </div>
    <hr />
    <div class="row clearfix">  
      <div class="col-md-12 column table-responsive">
        <table id="tblDatos" class="table hover order-column table-striped">
          <thead>
            <tr>
              <th>Código</th>
              <th>Nit o CI</th>
              <th>Nombre(s) Apellido(s)</th>
              <th>Dirección</th>
              <th>Telefono</th>
              <th>Estado</th>
              <th></th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>Código</th>
              <th>Nit o CI</th>
              <th>Nombre(s) Apellido(s)</th>
              <th>Dirección</th>
              <th>Telefono</th>
              <th>Estado</th>
              <th></th>
            </tr>
          </tfoot>
          
          <tbody>
          <?php  $i = 1; foreach ($listado as $cliente):?>
            <tr>
              <td><?= $cliente->id_cliente ?></td>
              <td><?= $cliente->nit_cliente ?></td>
              <td><?= $cliente->nombre_cliente ?></td>
              <td><?= $cliente->direccion_cliente ?></td>
              <td><?= $cliente->telefono_cliente ?></td>
              <td><?php if($cliente->estado_cliente == 0){echo "INACTIVO";} else {echo "ACTIVO";} ?></td>
              <td><a href="<?= base_url() ?>modifica_clientes/<?= $cliente->id_cliente ?>" class="btn btn-success" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
            </tr>
          <?php $i++; endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>