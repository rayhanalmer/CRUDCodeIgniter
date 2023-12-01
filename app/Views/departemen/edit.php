<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Update Data Departemen</h3>
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
            <form method="post" action="<?= base_url('departemen/update/'. $departemen->kode_departemen) ?>">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="nama">Nama Departemen</label>
                    <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" value="<?= $departemen->nama_departemen; ?>">
                </div>

                <div class="form-group">
                    <input type="hidden" name="kode_departemen" value="<?= $departemen->kode_departemen; ?>">
                    <input type="submit" value="Update" class="btn btn-info" />
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>