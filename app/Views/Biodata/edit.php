<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Biodata</h1>
            </div>
            <div class="card-body">
                <!-- Form edit biodata -->
                <form action="/biodata/update/<?= $biodata['id']; ?>" method="post">
                    <div class="form-group mb-3">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $biodata['nama']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="nim">Nim:</label>
                        <input type="number" class="form-control" id="nim" name="nim" value="<?= $biodata['nim']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="jk">Gender:</label>
                        <select class="form-control" id="jk" name="jk">
                            <option value="Laki-laki" <?php if ($biodata['jk'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                            <option value="Perempuan" <?php if ($biodata['jk'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tempat_lahir">Tempat lahir:</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $biodata['tempat_lahir']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="ttl">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="ttl" name="ttl" value="<?= $biodata['ttl']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="umur">Umur:</label>
                        <input type="text" class="form-control" id="umur" name="umur" value="<?= $biodata['umur']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $biodata['alamat']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="no_hp">No hp:</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $biodata['no_hp']; ?>">
                    </div>
                    <div class="form-group mb-3">
                
                        <?php if ($biodata['foto']): ?>
                            <img src="/assets/cover/<?= $biodata['foto']; ?>" width="100">
                        <?php else: ?>
                            <span>Tidak ada gambar</span>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
