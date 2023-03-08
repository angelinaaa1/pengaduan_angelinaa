<?=$this->extend('layouts/admin')?>
<?=$this->section('title')?>
PETUGAS
<?=$this->endSection()?>
<?=$this->section('content')?>
        <div class="row">
            <div class="col">
                <div class="card-border-primary">
                    <div class="card-header bg-primary">
                        <a href="#" data-petugas="" class="btn btn-outline-light" data-target="#modalPetugas" data-toggle="modal"><i class="fas fa-fw fa-solid fa-user-plus"></i>Tambah Data</a>
                    </div>
                    <div class="card-body">
                    <table class="table table-border table-striped" id="petugas">
                        
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Telp</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                        
                        <?php
                        $no = 0;
                        foreach ($petugas as $row) {
                            $data =$row['nama_petugas'] . "," . $row['username'] . "," . $row['telp'] . "," . $row['level'] . "," . base_url('petugas/edit/' . $row['id_petugas']);
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no?></td>
                                <td><?= $row['nama_petugas']?></td>
                                <td><?= $row['username']?></td>
                                <td><?= $row['telp']?></td>
                                <td><?= $row['level']?></td>
                               <td>
                                    <a href="" data-petugas="<?= $data ?>" data-target="#modalPetugas" data-toggle="modal" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="<?=base_url('petugas/delete/'. $row['id_petugas'])?>" onclick="retrun confirm('Yakin mau hapus?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                               </td>
                            </tr>
                        <?php
                        }
                        ?>
                        
                    </table>
                    </div>

                    <?php if (!empty(session()->getFlashdata("message"))) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata("message") ?>
                        </div>
                    <?php endif ?>

                    <div class="modal fade" id="modalPetugas" tabindex="-1" aria-labelledby="modalPetugasLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Input Data Petugas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="frmPetugas" action="" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama_petugas" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="nama_petugas" id="nama_petugas" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" id="username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="telp" class="form-group">No Telp</label>
                                            <input type="text" name="telp" id="telp" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="level" class="form-group">Level</label>
                                            <select name="level" id="level" class="form-control">
                                                <option value="">Pilih Level Anda</option>
                                                <option value="admin">Admin</option>
                                                <option value="petugas">Petugas</option>
                                            </select>

                                            <div class="form-group" id="ubahpassword">
                                                <label for="harga">Ubah Password</label>
                                                <input type="checkbox" name="ubahpassword" aria-label="Mau Ubah Password?" class="form-group">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->endSection() ?>
                <?= $this->Section("script")?>
                <script>
                    $(document).ready(function() {
                        $("#modalPetugas").on('show.bs.modal', function(event) {
                            var button = $(event.relatedTarget);
                            var data = button.data('petugas');
                            if (data != "") {
                                const barisdata = data.split(",");
                                $('#nama_petugas').val(barisdata[0]);
                                $('#username').val(barisdata[1]);
                                $('#telp').val(barisdata[2]);
                                $('#level').val(barisdata[3]).change();
                                $('#frmPetugas').attr('action', barisdata[4]);
                                $('#ubahpassword').show();
                            } else {
                                $('#nama_petugas').val('');
                                $('#username').val('');
                                $('#level').val('').change();
                                $('#frmPetugas').attr('action', 'spetugas');
                                $('#ubahpassword').hide();
                            }
                        });
                        $('#petugas').DataTable();
                    })
                    </script>
                    <?= $this->endSection() ?>
        
