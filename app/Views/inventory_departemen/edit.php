<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Update Data Barang</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Periksa Entrian Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= base_url('inventory_departemen/update/'. $barang->kode_barang) ?>">
                <?= csrf_field(); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Barang *</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $barang->nama_barang; ?>">
                        </div>
                        <div class="form-group">
                            <label for="merk_barang">Merk Barang</label>
                            <input type="text" class="form-control" id="merk_barang" name="merk_barang" value="<?= $barang->merk_barang; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_barang">Jumlah Barang *</label>
                            <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?= $barang->jumlah_barang; ?>">
                        </div>
                        <div class="form-group">
                            <label>Departemen *</label>
                            <select class="form-control" id="kode_departemen" name="kode_departemen">
                                <?php foreach($departemen as $l){ ?>
                                    <option value="<?php echo $l->kode_departemen; ?> " default="<?php echo $barang->kode_departemen?>"><?php echo $l->nama_departemen; ?>   </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nilai_perolehan">Nilai Perolehan</label>
                            <input type="text" class="form-control" id="nilai_perolehan" name="nilai_perolehan" value="<?= $barang->nilai_perolehan; ?>">
                        </div>
                        <div class="form-group">
                            <label for="kodisi_barang">Kondisi Barang</label>
                            <input type="text" class="form-control" id="kondisi_barang" name="kondisi_barang" value="<?= $barang->kondisi_barang; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama">Catatan</label>
                            <input type="text" class="form-control" id="catatan" name="catatan" value="<?= $barang->catatan; ?>">
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <div class="form-group">
                                <input type="hidden" name="kode_barang" value="<?= $barang->kode_barang; ?>">
                                <input type="submit" value="Update" class="btn btn-info" />
                        </div>
                        </div>
                    </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>