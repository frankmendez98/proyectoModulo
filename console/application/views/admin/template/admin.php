<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row" id="row1">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">


				<?php if (isset($buttons)): ?>
					<div class="ibox-title">
						<?php foreach ($buttons as $btn):?>
							<?php if($btn["modal"]==true): ?>
								<a
									<?php if(isset($btn["url"])): ?>
										href = '<?=base_url("admin/".$btn["url"])?>'
									<?php else: ?>
										href = '#'
									<?php endif; ?>
									id="modal_btn_add" role="button" class="btn btn-primary" data-toggle="modal" data-target="#viewModal" data-refresh='true'>
									<span class="btn-label"><i class="<?=$btn["icon"]?>"></i></span><?=$btn["txt"]?>
								</a>
							<?php else: ?>
								<a href="<?=base_url("admin/".$btn["url"])?>" class="btn btn-primary">
									<span class="btn-label"><i class="<?=$btn["icon"]?>"></i></span><?=$btn["txt"]?>
								</a>
							<?php endif; ?>
						<?php endforeach;?>
					</div>
				<?php endif; ?>

                <div class="ibox-content">
                    <!--load datables estructure html-->
                    <header>
                        <h3 class="text-navy"><i class="<?=$icono;?>"></i> <?=$titulo?></h3>
                    </header>
                    <section>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover table-checkable datatable" id="editable">
                                <thead class="thead-dark">
                                    <tr>
                                        <?php foreach ($table as $key => $value): ?>
                                            <th class='col-md-<?=$value?> text-success font-bold'><?= $key ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!--div class='ibox-content'-->
                    </section>
                    <!--Show Modal Popups View & Delete -->
                </div>
                <!--div class='ibox-content'-->
            </div>
            <!--<div class='ibox float-e-margins' -->
        </div>
        <!--div class='col-lg-12'-->
    </div>
    <!--div class='row'-->
</div>
<?php if (isset($cat)): ?>
<input type="hidden" id="id_cat" value="<?=$cati?>">
<input type="hidden" id="cat" value="<?=$cat?>">
<?php endif; ?>
<div class='modal fade' id='viewModal' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-md'>
        <div class='modal-content modal-md'>
		</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php if(isset($urljs)):?>
	<script src="<?= base_url(); ?>assets/admin/js/funciones/<?=$urljs; ?>"></script>
<?php endif;?>
