<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="wrapper wrapper-content">
	<div class="row">
    <div class="col-lg-12">
        <!--Primero si e si es inv. inicial ,factura de compra, compra caja chica, traslado de otra sucursal; luego Registrar No. de Factura , lote, proveedor -->
        <div class="ibox">

            <div class="ibox-content">
                <div class="row">
                    <!-- /widget-header -->
                    <div class='widget-content'>
                      <div id='form_factura_compra'>
                        <div class="row" hidden>
                          <div class="col-md-12">

                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Proveedor</label>
                                <select class="form-control" name="proveedor" id="proveedor">

                                </select>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group">
                                <label>Tipo documento</label>
                                <select class="form-control" name="tipo_doc" id="tipo_doc">
                                  <option value="FAC">Factura</option>
                                  <option value="CCF">Credito fiscal</option>
                                </select>
                              </div>
                            </div>
                            <div class='col-md-2'>
                              <div class='form-group'>
                                <label>Numero de Documento</label>
                                <input type='text' placeholder='Numero de Documento' class='form-control' id='numero_doc2' name='numero_doc2'>
                              </div>
                            </div>
                            <div class='col-md-2' hidden>
                              <div class='form-group'>
                                <label>Tipo compra</label>
                                <select class="form-control select2" name="tipo_compra" id="tipo_compra">
                                  <option value="0">Contado</option>
                                  <option value="1">Crédito</option>
                                </select>
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class='row'>
                          <div class="col-md-12">
                            <div class="col-md-5">
                              <div class='form-group has-info'><label>Buscar Producto</label>
                                <div id="scrollable-dropdown-menu">
        													<input type="text" id="producto_buscar" style="width:100% !important" class=" form-control usage typeahead" placeholder="Ingrese nombre de producto" data-provide="typeahead" style="border-radius:0px">
        												</div>
                              </div>
                            </div>
                            <?php $fecha_actual=date("d-m-Y"); ?>
                            <div class='col-md-2'>
                              <div class='form-group'>
                                <label>Fecha:</label>
                                <input type='text' placeholder='Fecha' class='datepick2 form-control' value='<?php echo $fecha_actual; ?>' id='fecha2' name='fecha2'></div>
                            </div>

                            <div class="col-md-3">

                            </div>
                            <div class="col-md-2">
                              <button type="button" id="submit1" name="submit1" class="btn btn-primary pull-right usage" style="margin-top:20px;"><i class="fa fa-check"></i> F2 Guardar</button>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="ibox">
                <div class="row">
                  <div class="ibox-content">
                    <!--load datables estructure html-->
                      <input type='hidden' name='porc_iva' id='porc_iva' value='<?php echo $iva; ?>'>
                      <input type='hidden' name='monto_percepcion' id='monto_percepcion' value='<?php echo $monto_percepcion; ?>'>
                      <input type="hidden" id="percepcion" name="percepcion" value="0">
                        <div class="wrap-table1001">
                          <div class="table100 ver1 m-b-10">
                            <div class="table100-head">
                              <table id="inventable1">
                                <thead>
                                  <tr class="row100 head">
                                    <th class="col-md-1">Id</th>
                                    <th class='col-md-4'>Nombre</th>
																		<!-- <th class='col-md-2'>Talla</th> -->
                                    <th class='col-md-2'>Precio</th>
                                    <th class='col-md-2'>Cantidad</th>
                                    <th class='col-md-1'>Acci&oacute;n</th>
                                  </tr>
                                </thead>
                              </table>
                            </div>
                            <div class="table100-body js-pscroll">
                              <table id="inventable">
                                <tbody >

                                </tbody>
                              </table>
                            </div>
                            <div class="table101-body">
                              <table>
                                <tbody>
                                  <tr>
                                    <td class="col-md-12" colspan="6">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td class='text-bluegrey tr_bb col-md-5'  id='totaltexto'>&nbsp;</td>
                                    <td class='leftt  text-bluegrey  tr_bb col-md-2' >CANT. PROD:</td>
                                    <td class='text-right text-danger  tr_bb col-md-2' id='totcant'>0</td>
                                    <td class="leftt text-bluegrey  tr_bb col-md-1">TOTAL $:</td>
                                    <td class='text-right text-green  tr_bb col-md-2' id='total_gravado'>0.00</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      <input type="hidden" name="autosave" id="autosave" value="false-0">
                      <input type="hidden" name="process" id="process" value="insert"><br>
                    <div>
                      <input type='hidden' name='urlprocess' id='urlprocess'value="">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
      </div>
	</div>
</div>
<script src="<?= base_url(); ?>assets/admin/js/funciones/<?=$urljs; ?>"></script>
