<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>List Departemen</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <a href="<?= base_url('/departemen/create'); ?>" class="btn btn-primary">Tambah Data Departemen</a>
            <form>
                <div class="input-group my-1">
                    <input name="cari" type="search" class="form-control" placeholder="Search" value="<?= $cari; ?>"/>
                    <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                </div>
            </form>
            <hr />
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Departemen</th>
                    <th>Action</th>
                </tr>
                <?php
                $no = 1;
                foreach ($departemen as $row) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->kode_departemen; ?></td>
                        <td><a title="Edit" href="<?= base_url("inventory_departemen/find/$row->kode_departemen"); ?>" ><?= $row->nama_departemen; ?></a></td> 
                        <td>
                            <a title="Edit" href="<?= base_url("departemen/edit/$row->kode_departemen"); ?>" class="btn btn-info">Ubah</a>
                            <a title="Delete" href="<?= base_url("departemen/delete/$row->kode_departemen") ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>