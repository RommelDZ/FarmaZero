<section class="row clearfix">
    <div class="col-md-12 column">
        <div class="row clearfix frm-header">
            <div class="col-md-10 column">
                <h3>
                    Listado de Laboratorios
                </h3>
            </div>
                <div class="col-md-2 column btn-new">
                <a href="<?= base_url() ?>registra_laboratorios" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Nuevo Laboratorio</a>
            </div>
        </div>
        <hr />
        <div class="row clearfix">  
            <div class="col-md-12 column table-responsive">
                <table id="tblDatos" class="table hover order-column table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </tfoot>
                  
                    <tbody>
                    <?php  $i = 1; foreach ($listado as $laboratorio):?>
                        <tr>
                            <td><?= $laboratorio->id_laboratorio ?></td>
                            <td><?= $laboratorio->nombre_laboratorio ?></td>
                            <td><?= $laboratorio->nombre_ciudad ?></td>
                            <td><?= $laboratorio->direccion_laboratorio ?></td>
                            <td><?= $laboratorio->telefono_laboratorio ?></td>
                            <td><?= $laboratorio->email_laboratorio ?></td>
                            <td><?php if($laboratorio->estado_laboratorio == 0){echo "INACTIVO";} else {echo "ACTIVO";} ?></td>
                            <td><a href="<?= base_url() ?>modifica_laboratorios/<?= $laboratorio->id_laboratorio ?>" class="btn btn-success" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
                        </tr>
                    <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>