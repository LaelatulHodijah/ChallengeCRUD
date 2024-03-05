<!-- app/Views/biodata/add.php -->
<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card mt-3">
            <div class="card-header">
                <h1>Tambah Biodata</h1>
            </div>
            <div class="card-body">
                <!-- Form tambah biodata -->
                <form action="/biodata/create" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="col-md-6">
                        <label for="nim">Nim:</label>
                        <input type="text" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="col-md-6">
                        <label for="jk">Gender:</label>
                        <select class="form-control" id="jk" name="jk">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="tempat_lahir">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                    </div>
                    <div class="col-md-6">
                        <label for="ttl">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="ttl" name="ttl">
                    </div>
                    <div class="col-md-6">
                        <label for="umur">Umur:</label>
                        <input type="text" class="form-control" id="umur" name="umur">
                    </div>
                    <div class="col-md-6">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="col-md-6">
                        <label for="no_hp">No Hp:</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp">
                    </div>
                    <div class="col-md-6">
                        <label for="foto" class="form-label">Foto:</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
