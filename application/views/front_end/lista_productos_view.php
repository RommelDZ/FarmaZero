<section class="row clearfix">
  <div class="col-md-12 column">
    <div class="row clearfix frm-header">
      <div class="col-md-10 column">
        <h3>
          Listado de Productos
        </h3>
      </div>
      <div class="col-md-2 column btn-new">
        <a href="<?= base_url() ?>registra_productos" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Nuevo Producto</a>
      </div>
    </div>
    <hr />
    <div class="row clearfix">  
      <div class="col-md-12 column table-responsive">
        <table id="tblDatos" class="table hover order-column table-striped">
          <thead>
            <tr>
              <th>Código</th>
              <th>Producto</th>
              <th>Precio</th>
              <th>Stock</th>
              <th>Fecha Vencimiento</th>
              <th>Laboratorio</th>
              <th>Presentación</th>
              <th>Categoria</th>
              <th></th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>Código</th>
              <th>Producto</th>
              <th>Precio</th>
              <th>Stock</th>
              <th>Fecha Vencimiento</th>
              <th>Laboratorio</th>
              <th>Presentación</th>
              <th>Categoria</th>
              <th></th>
            </tr>
          </tfoot>
          
          <tbody>
          <?php  $i = 1; foreach ($listado as $producto):?>
            <tr>
              <td><?= $producto->id_producto ?></td>
              <td><?= $producto->nombre_producto ?></td>
              <td><?= number_format($producto->precio_producto, 2, ',', '') ?> Bs.</td>
              <td><?= $producto->stock_producto ?></td>
              <td data-order="<?= $producto->fechavencimiento_producto ?>"><?= date("d/m/Y",strtotime($producto->fechavencimiento_producto)) ?></td>
              <td><?= $producto->nombre_laboratorio ?></td>
              <td><?= $producto->nombre_presentacionproducto ?></td>
              <td><?= $producto->nombre_categoriaproducto ?></td>
              <td><a href="<?= base_url() ?>modifica_productos/<?= $producto->id_producto ?>" class="btn btn-success" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
            </tr>
          <?php $i++; endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>