<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Barang</h3>
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
            <form method="post" action="<?= base_url('Inventory_departemen/store') ?>">
                <?= csrf_field(); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang *</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?= old('kode_barang'); ?>">
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Barang *</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= old('nama_barang'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="merk_barang">Merk Barang</label>
                            <input type="text" class="form-control" id="merk_barang" name="merk_barang" value="<?= old('merk_barang'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_barang">Jumlah Barang *</label>
                            <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?= old('jumlah_barang'); ?>">
                        </div>
                        <div class="form-group">
                        <label>Departemen</label>
                            <select class="form-control" id="kode_departemen" name="kode_departemen">
                                <?php foreach($departemen as $l){ ?>
                                    <option value="<?php echo $l->kode_departemen; ?>"><?php echo $l->nama_departemen; ?>   </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nilai_perolehan">Nilai Perolehan</label>
                            <input type="text" class="form-control" id="nilai_perolehan" name="nilai_perolehan" value="<?= old('nilai_perolehan'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="kondisi_barang">Kondisi Barang</label>
                            <input type="text" class="form-control" id="kondisi_barang" name="kondisi_barang" value="<?= old('kondisi_barang'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <input type="text" class="form-control" id="catatan" name="catatan" value="<?= old('catatan'); ?>">
                        </div>
                    </div>
                </div>
            

                <div class="row">
                    <div class="col-md-12 text-right">
                        <div class="form-group" >
                            <input type="submit" value="Simpan" class="btn btn-info" />
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>