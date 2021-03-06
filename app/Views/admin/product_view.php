<?= $this->extend('default_layout') ?>
<?= $this->section('content') ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<!-- <h1>Fixed Navbar Layout</h1> -->
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Admin</a></li>
					<li class="breadcrumb-item active">Produk</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<!-- Default box -->
				<div class="card card-secondary">
					<div class="card-header">
						<h3 class="card-title"><i class="fas fa-store-alt"></i> Produk Toko</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>

						</div>
					</div>
					<div class="card-body">
						<div class="row" style="margin-bottom: 10px;">
							<div class="col-xs-8">
								<button class="btn btn-app btn-success btn-xs" onclick="add_produk()">
									<i class="ace-icon fa fa-plus align-top bigger-125"></i>
									Tambah
							</div>
							</button>

						</div>
						<!-- content -->
						<div class="col-12">
						<table id="simple-table" class="table  table-bordered table-hover">
					<thead>
						<tr>
							<!-- <th class="center">
								<label class="pos-rel">
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</th> -->
							<th style="width:3px">No</th>
							<th style="width:3px">Kode Produk</th>
							<th>Nama Produk</th>
							<th style="width:3px">Harga Eceran</th>
							<th style="width:3px">Harga Grosir</th>
							<th style="width:3px">Minimum Grosir</th>
							<th width="10%">Tanggal Buat</th>
							<th>Keterangan</th>
							<th style="width:100px">
								<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
								Action
							</th>
							<!-- <th class="hidden-480">Status</th> -->
						</tr>
					</thead>

					<tbody>
						<?php if ($produk) : ?>
							<?php
							$no = 1;
							foreach ($produk as $mbeli) : ?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $mbeli->kd_produk; ?></td>
									<td><?php echo $mbeli->nama_produk; ?></td>
									<td><?php echo $mbeli->harga_eceran; ?></td>
									<td><?php echo $mbeli->harga_grosir; ?></td>
									<td><?php echo $mbeli->batas_grosir; ?></td>
									<td><?php echo date("d-m-Y", strtotime($mbeli->created_date)); ?></td>
									<td><?php echo $mbeli->keterangan; ?></td>
									<td>
													<div class="hidden-md hidden-lg">
														<div class="inline pos-rel">
															<button type="button" class="btn-xs	 btn-block btn-outline-primary small"> <i class="fa fa-edit"></i>Edit</button>
														</div>
													</div>
													<p></p>
													<div class="hidden-md hidden-lg">
														<div class="inline pos-rel">
															<button type="button" class="btn-xs	 btn-block btn-outline-danger small"> <i class="fa fa-trash"></i> Hapus</button>
														</div>
													</div>
												</td>
								</tr>
							<?php
								$no++;
							endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<?php if ($pager) : ?>
								<?php $pagi_path = 'pos_beta/produk'; ?>
								<?php $pager->setPath($pagi_path); ?>
								<?= $pager->links() ?>
							<?php endif ?>
						</div>
					</div>
				</div>
						</div><!-- /.span -->
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<!-- No nota -->
					</div>
					<!-- /.card-footer-->
				</div>
				<!-- /.card -->
			</div>
		</div>

	</div>
</section>
<!-- inline scripts related to this page -->
<!-- Bootstrap modal -->

<div class="modal fade " id="modal_addproduk" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header bg-secondary">
				<h4 class="modal-title">Tambah produk baru</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body form">
				<form action="#" id="form" class="form-horizontal">
					<input type="hidden" value="" name="id" />
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Kode Barcode</label>
							<div class="col-md-9">
								<input name="add_kodeproduk_barcode" id="add_kodeproduk_barcode" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Kode Produk</label>
							<div class="col-md-9">
								<input name="add_kodeproduk" id="add_kodeproduk" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Nama Produk</label>
							<div class="col-md-9">
								<input name="add_produk" id="add_produk" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Harga Eceran</label>
							<div class="col-md-9">
								<input name="add_harga" id="add_harga" class="form-control" type="number">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Harga Grosir</label>
							<div class="col-md-9">
								<input name="add_harga_grosir" id="add_harga_grosir" class="form-control" type="number">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Minimal Qty Grosir</label>
							<div class="col-md-9">
								<input name="add_qtymin_grosir" id="add_qtymin_grosir" class="form-control" type="number">
								<span class="help-block"></span>
							</div>
						</div>

					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save_newproduk()" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- End Bootstrap modal -->

<?= $this->endSection() ?>
<? $this->section('jscript') ?>

<script src="<?= base_url("resources/assets/js/jquery-ui.custom.min.js") ?>"></script>
<script src="<?= base_url("resources/assets/js/jquery.ui.touch-punch.min.js") ?>"></script>
<script src="<?= base_url("resources/assets/js/chosen.jquery.min.js") ?>"></script>
<script type="text/javascript">
	var save_method; //for save method string
	var nota_pembelian;
	jQuery(function($) {
		nota_pembelian = $("#nota_pembelian").val();
		$("#no_nota").html("<h4>No Nota : " + nota_pembelian + "</h4>");
		// if (!ace.vars['touch']) {

		$('.chosen-select').chosen({
			allow_single_deselect: true,
			width: "75%"
		});

	});

	function add_person() {
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Transaksi Pembelian'); // Set Title to Bootstrap modal title
	}

	function add_produk() {
		$('#modal_addproduk').modal('show');
	}

	function showBarang(str) {
		if (str == "") {
			$('#nama_barang').val('');
			$('#harga_barang').val('');
			$('#qty').val('');
			$('#reset').hide();
			return;
		} else {
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					$("#data_produk").html(xmlhttp.responseText);
					// alert(xmlhttp.responseText);
				}
			}
			xmlhttp.open("GET", "<?= base_url('pembelian/getProduk') ?>/" + str, true);
			xmlhttp.send();
		}
	}

	function delete_person(id) {
		if (confirm('Apakah anda yakin untuk menghapusnya?')) {
			// ajax delete data to database
			$.ajax({
				url: "<?php echo site_url('person/ajax_delete') ?>/" + id,
				type: "POST",
				dataType: "JSON",
				success: function(data) {
					//if success reload ajax table
					$('#modal_form').modal('hide');
					reload_table();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error deleting data');
				}
			});

		}
	}
</script>
<?= $this->endSection() ?>