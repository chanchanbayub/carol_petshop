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
                            <h3 class="card-title">Daftar Kategori Product </h3>
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
                        <button type="button" class="btn btn-inline btn-outline-dark btn-xs mb-3" id="modal_save" data-toggle="modal" data-target="#modal_add"> <i class="fas fa-dolly-flatbed"></i> Tambah Kategori Produk </button>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr align="center">
                                    <th>No </th>
                                    <th>Nama Katagori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 + (5 * ($currentPage - 1));
                                if (count($category) > 0) :
                                    foreach ($category as $category) : ?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $category["category"] ?></td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                <button type="button" class="btn btn-inline btn-outline-warning btn-xs mb-3 edit" data-toggle="modal" data-target="#modal_add" data-id="<?= $category["id"] ?>"> <i class="fa fa-edit"></i></button>
                                                <button class="btn btn-inline btn-outline-danger btn-xs mb-3 delete" data-toggle="modal" data-target="#modal_delete" data-id="<?= $category["id"] ?>"> <i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="10" align="center">Tidak Ada Data</td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table>
                        <br>
                        <?= $pager->links('category_product', 'custom_pagination'); ?>
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
                <h4 class="modal-title"> Tambah Category Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="category_form" autocomplete="off">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="category" class="col-form-label">Kategori : </label>
                        <input type="text" style="text-transform: capitalize;" class="form-control" id="category" name="category" placeholder="Masukan Kategori Produk">
                        <small class="text-danger" id="errorCategory"></small>
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
                <h4 class="modal-title"> Hapus Kategori Produk </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" autocomplete="off">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id_delete">
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
    $("#modal_save").click(function(e) {

        $(".modal-title").html('Tambah Kategori Produk');
        $("#category").removeClass('is-invalid');
        $("#errorCategory").html('');
        $("#category").val('');
        $("#id").val('');

        $(".update").attr('disabled', 'disabled');
        $(".update").css('display', 'none');
        $(".save").removeAttr('disabled', 'disabled');
        $(".save").css('display', 'block');

    })

    $(".save").click(function(e) {
        e.preventDefault();
        let category = $("#category").val();
        // alert(category);
        $.ajax({
            url: '/administrator/save/category',
            type: 'POST',
            data: {
                category: category
            },
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    if (response.error.category) {
                        $("#category").addClass('is-invalid');
                        $("#errorCategory").html(response.error.category);
                    } else {
                        $("#category").removeClass('is-invalid');
                        $("#errorCategory").html('');
                    }
                } else {
                    Swal.fire({
                        title: `${response.success}`,
                        icon: 'success'
                    });
                    setInterval(function(e) {
                        document.location.reload()
                    }, 500);
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

        $(".modal-title").html('Ubah Kategori Produk');

        let id = $(this).data('id');
        // alert(category);
        $.ajax({
            url: '/administrator/edit/category',
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                $("#id").val(response.id);
                $("#category").val(response.category);
            }
        });
    });

    $(".update").click(function(e) {
        e.preventDefault();
        let id = $("#id").val();
        let category = $("#category").val();
        // alert(category);
        $.ajax({
            url: '/administrator/update/category',
            type: 'POST',
            data: {
                id: id,
                category: category
            },
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    if (response.error.category) {
                        $("#category").addClass('is-invalid');
                        $("#errorCategory").html(response.error.category);
                    } else {
                        $("#category").removeClass('is-invalid');
                        $("#errorCategory").html('');
                    }
                } else {
                    Swal.fire({
                        title: `${response.success}`,
                        icon: 'success'
                    });
                    setInterval(function(e) {
                        document.location.reload()
                    }, 500);
                }
            }
        });
    });

    $(".delete").click(function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        // alert(category);
        $.ajax({
            url: '/administrator/edit/category',
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
            url: '/administrator/delete/category',
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
    });
</script>
<?= $this->endSection(); ?>