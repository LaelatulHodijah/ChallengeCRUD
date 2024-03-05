<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card mt-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">   
                        <h1>Biodata Diri</h1>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="/biodata/add" class="btn btn-primary">Tambahkan Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Gender</th>
                            <th>TTL</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>No hp</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $no = 1; ?>
                        <?php foreach ($biodatas as $biodata): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $biodata['nama'] ?></td>
                                <td><?= $biodata['nim'] ?></td>
                                <td><?= $biodata['jk'] ?></td>
                                <td><?= $biodata['tempat_lahir'] . ', ' . $biodata['ttl']; ?></td>
                                <td><?= $biodata['umur'] ?></td>
                                <td><?= $biodata['alamat'] ?></td>
                                <td><?= $biodata['no_hp'] ?></td>
                                <td><img width="50px" src="/assets/cover/<?= $biodata["foto"]; ?>"></td>
                                <td>
                                    <a href="/biodata/edit/<?= $biodata['id']; ?>" class="btn btn-success">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirmDelete(<?= $biodata['id']; ?>)">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmDelete(id) {
        swal({
                title: "Apakah Anda yakin?",
                text: "Setelah dihapus, data Anda akan benar-benar hilang!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "/biodata/destroy/" + id;
                } else {
                    swal("Data tidak jadi dihapus!");
                }
            });
    }
</script>
<!-- Script untuk menampilkan alert -->
<?php if(session()->getFlashdata('success')): ?>
<script>
    alert("<?= session()->getFlashdata('success') ?>");
</script>
<?php endif; ?>
<?= $this->endSection() ?>
