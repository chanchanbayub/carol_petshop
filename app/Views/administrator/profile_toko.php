<?= $this->extend('administrator/layout/template') ?>
<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <hr width="95%">
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Profile Toko</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow: auto;">
                            <div class="row">
                                <div class="col-md-8">
                                    <form method="get" id="search" autocomplete="off">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" style="text-transform: capitalize;" name="keyword" id="keyword" placeholder="Masukan Kategori Product" autofocus>
                                            <button class="btn btn-outline-primary " type="Submit" id="button-addon2"> <i class="fa fa-search"></i> </button>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                        <?php if ($profile == null) : ?>
                            <button type="button" class="btn btn-inline btn-outline-dark btn-xs mb-3" id="modal_save" data-toggle="modal" data-target="#modal_add"> <i class="fas fa-plus"></i> Profile Toko </button>
                        <?php endif; ?>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr align="center">
                                    <th>No </th>
                                    <th>Nama Toko</th>
                                    <th>Username </th>
                                    <th>No Whatsapp </th>
                                    <th>Link Instagram </th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($profile != null) : ?>
                                    <tr>
                                        <td>1.</td>
                                        <td><?= $profile["nama_toko"] ?></td>
                                        <td><?= $profile["username"] ?></td>
                                        <td><?= $profile["nomor_whatsapp"] ?></td>
                                        <td><?= $profile["link_instagram"] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-inline btn-outline-warning btn-xs edit" data-toggle="modal" data-target="#modal_add" data-id="<?= $profile["id"] ?>"> <i class="fas fa-edit"></i> </button>
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="8" align="center">Tidak Ada Data</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<!-- Modal Tambah -->
<div class="modal fade" id="modal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Profile Toko</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="profil_form" autocomplete="off">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama_toko" class="col-form-label">Nama Toko : </label>
                        <input type="text" name="nama_toko" style="text-transform: capitalize;" id="nama_toko" class="form-control" placeholder="Masukan Nama Toko">
                        <small class="text-danger" id="errorNamaToko"></small>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-form-label">Username : </label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username">
                        <small class="text-danger" id="errorUsername"></small>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password : </label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
                        <small class="text-danger" id="errorPassword"></small>
                    </div>
                    <div class="form-group">
                        <label for="nomor_whatsapp" class="col-form-label">Nomor Whatsapp : </label>
                        <input type="tel" name="nomor_whatsapp" style="text-transform: capitalize;" id="nomor_whatsapp" class="form-control" placeholder="cth: 6281021313">
                        <small class="text-danger" id="errorNomor"></small>
                    </div>
                    <div class="form-group">
                        <label for="link_instagram" class="col-form-label">Link Instagram : </label>
                        <input type="url" name="link_instagram" id="link_instagram" class="form-control" placeholder="Masukan Link Instagram">
                        <small class="text-danger" id="errorInstagram"></small>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                        <button type="submit" class="btn btn-outline-dark save"> <i class=" fa fa-check"></i> Simpan</button>
                        <button type="submit" class="btn btn-outline-dark update"> <i class=" fa fa-check"></i> Update </button>
                    </div>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Hapus -->
<div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Hapus Produk </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" autocomplete="off">
                    <?= csrf_field(); ?>
                    <input type="text" name="id" id="id_delete">
                    <label for="">Apakah Anda Yakin ?</label>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                        <button type="button" class="btn btn-outline-dark delete_data"> <i class="fa fa-exclamation-triangle"></i> Hapus</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>
<!-- /.content-wrapper -->

<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#category_id").select2({
            theme: "bootstrap4"
        });

    })
    $("#modal_save").click(function(e) {

        $(".modal-title").html('Tambah Kategori Produk');
        $("#id").val('');


        $("#nama_toko").val('');
        $("#nama_toko").removeClass('is-invalid');
        $("#errorNamaToko").html('');

        $("#username").val('');
        $("#username").removeClass('is-invalid');
        $("#errorUsername").html('');

        $("#password").val('');
        $("#password").removeClass('is-invalid');
        $("#errorPassword").html('');

        $("#nomor_whatsapp").val('');
        $("#nomor_whatsapp").removeClass('is-invalid');
        $("#errorNomor").html('');

        $("#link_instagram").val('');
        $("#link_instagram").removeClass('is-invalid');
        $("#errorInstagram").html('');


        $(".update").attr('disabled', 'disabled');
        $(".update").css('display', 'none');
        $(".save").removeAttr('disabled', 'disabled');
        $(".save").css('display', 'block');


    })

    $(".save").click(function(e) {
        e.preventDefault();
        let nama_toko = $("#nama_toko").val();
        let username = $("#username").val();
        let password = $("#password").val();
        let nomor_whatsapp = $("#nomor_whatsapp").val();
        let link_instagram = $("#link_instagram").val();

        $.ajax({
            url: '/administrator/save/profile_toko',
            type: 'POST',
            data: {
                nama_toko: nama_toko,
                username: username,
                password: password,
                nomor_whatsapp: nomor_whatsapp,
                link_instagram: link_instagram
            },
            dataType: 'JSON',
            success: function(response) {
                if (response.error) {
                    if (response.error.nama_toko) {
                        $("#nama_toko").addClass('is-invalid');
                        $("#errorNamaToko").html(response.error.nama_toko);
                    } else {
                        $("#nama_toko").removeClass('is-invalid');
                        $("#errorNamaToko").html('');
                    }
                    if (response.error.username) {
                        $("#username").addClass('is-invalid');
                        $("#errorUsername").html(response.error.username);
                    } else {
                        $("#username").removeClass('is-invalid');
                        $("#errorUsername").html('');
                    }
                    if (response.error.password) {
                        $("#password").addClass('is-invalid');
                        $("#errorPassword").html(response.error.password);
                    } else {
                        $("#password").removeClass('is-invalid');
                        $("#errorPassword").html('');
                    }
                    if (response.error.nomor_whatsapp) {
                        $("#nomor_whatsapp").addClass('is-invalid');
                        $("#errorNomor").html(response.error.nomor_whatsapp);
                    } else {
                        $("#nomor_whatsapp").removeClass('is-invalid');
                        $("#errorNomor").html('');
                    }
                    if (response.error.link_instagram) {
                        $("#link_instagram").addClass('is-invalid');
                        $("#errorInstagram").html(response.error.link_instagram);
                    } else {
                        $("#link_instagram").removeClass('is-invalid');
                        $("#errorInstagram").html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`
                    });
                    setInterval(function() {
                        location.reload();
                    }, 1000);
                }
            }
        });
    });

    $(".edit").click(function(e) {
        e.preventDefault();
        $(".save").attr('disabled', 'disabled');
        $(".save").css('display', 'none');
        $(".update").removeAttr('disabled', 'disabled');
        $(".update").css('display', 'block');
        $(".modal-title").html('Ubah Profile Toko');

        let id = $(this).data('id');

        $.ajax({
            url: '/administrator/edit/profile_toko',
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                $("#id").val(response.id);
                $("#nama_toko").val(response.nama_toko);
                $("#username").val(response.username);
                $("#password").val('');
                $("#nomor_whatsapp").val(response.nomor_whatsapp);
                $("#link_instagram").val(response.link_instagram);
            }
        });
    });

    $(".update").click(function(e) {
        e.preventDefault();
        let id = $("#id").val();
        let nama_toko = $("#nama_toko").val();
        let username = $("#username").val();
        let password = $("#password").val();
        let nomor_whatsapp = $("#nomor_whatsapp").val();
        let link_instagram = $("#link_instagram").val();

        $.ajax({
            url: '/administrator/update/profile_toko',
            type: 'POST',
            data: {
                id: id,
                nama_toko: nama_toko,
                username: username,
                password: password,
                nomor_whatsapp: nomor_whatsapp,
                link_instagram: link_instagram
            },

            dataType: 'json',
            success: function(response) {
                Swal.fire({
                    title: `${response.success}`,
                    icon: 'success'
                });
                setInterval(function(e) {
                    location.reload()
                }, 1000);
            }
        });
    });

    $(".delete").click(function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        // alert(category);
        $.ajax({
            url: '/administrator/edit/product',
            type: 'POST',
            data: {
                id: id,
            },
            dataType: 'json',
            success: function(response) {
                $("#id_delete").val(response.id)
            }
        });
    });

    $(".delete_data").click(function(e) {
        e.preventDefault();
        let id = $('#id_delete').val();
        // alert(category);
        $.ajax({
            url: '/administrator/delete/product',
            type: 'POST',
            data: {
                id: id,
            },
            dataType: 'json',
            success: function(response) {
                Swal.fire({
                    title: `${response.success}`,
                    icon: 'success'
                });
                setInterval(function(e) {
                    document.location.reload()
                }, 500);
            }
        });
    })
</script>
<?= $this->endSection(); ?>