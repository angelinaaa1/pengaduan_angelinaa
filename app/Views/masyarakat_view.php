<?=$this->extend('layouts/admin')?>
<?=$this->section('title')?>
MASYARAKAT
<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="col">
    <div class="card">
            <div class="card-body">
                <table class="table tabel-border tabel-striped" id="masyarakat">
                    <tr>
                        <th>No</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Telp</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $no = 0 ;
                    foreach ($masyarakat as $row){
                        $data = $row['nik'] . "," . $row['nama'] . "," . $row['username']. "," . $row['password'] . "," . $row['telp'] . "," . base_url('masyarakat/edit/'. $row['id_masyarakat']);
                        $no++;
                        ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$row['nik']?></td>
                            <td><?=$row['nama']?></td>
                            <td><?=$row['username']?></td>
                            <td><?=$row['telp']?></td>
                            <td>
                                    <a href="" data-masyarakat="<?= $data ?>" data-target="#modalMasyarakat" data-toggle="modal" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="<?=base_url('masyarakat/delete/'. $row['id_masyarakat'])?>" onclick="retrun confirm('Yakin mau hapus?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>

                <?php if(!empty(session()->getFlashdata("message"))) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata("message") ?>
                    </div>
                <?php endif ?>

                <div class="modal fade" id="modalMasyarakat" tabindex="-1" aria-labelledby="modalMasyarakatLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="card-header">
                                <h5 class="modal-title" id="exsampleModalMasyarakat">Input Data Masyarakat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="smasyarakat" id="frmMasyarakat" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nik" class="form-label">Nik</label>
                                        <input type="text" name="nik" id="nik" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control">
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
                                        <label for="telp" class="form-label">Telp</label>
                                        <input type="text" name="telp" id="telp" class="form-control">
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
        
    </div>
</div>
<?=$this->endSection()?>
<?= $this->Section("script")?>
            <script>
                $(document).ready(function() {
                $("#modalMasyarakat").on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var data = button.data('masyarakat');
                    if (data != "") {
                        const barisdata = data.split(",");
                        $('#nik').val(barisdata[0]);
                        $('#nama').val(barisdata[1]);
                        $('#username').val(barisdata[2]);
                        $('#password').val(barisdata[3]);
                        $('#telp').val(barisdata[4]).change();
                        $('#frmMasyarakat').attr('action', barisdata[5]);
                        $("#ubahpassword").show();
                    } else {
                        $('#nik').val('');
                        $('#nama').val('');
                        $('#username').val('');
                        $('#password').val('');
                        $('#telp').val('');
                        $('#frmMasyarakat').attr('action', 'smasyarakat');
                        $("#ubahpassword").hide();
                    }
                });
                $('#masyarakat').DataTable();
            })
            </script>
            <?= $this->endSection() ?>