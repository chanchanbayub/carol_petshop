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
                        <button type="button" class="btn btn-inline btn-outline-dark btn-xs mb-3" id="modal_save" data-toggle="modal" data-target="#modal_add"> <i class="fas fa-dolly"></i> Tambah Produk </button>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr align="center">
                                    <th>No </th>
                                    <th>Kode Produk</th>
                                    <th>Katagori Produk</th>
                                    <th>Nama Produk </th>
                                    <th>Stok Produk </th>
                                    <th>Harga Produk </th>
                                    <th>Deskripsi Produk </th>
                                    <th>Foto Produk </th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 + (10 * ($currentPage - 1));
                                if (count($product) > 0) :
                                    foreach ($product as $product) : ?>
                                        <tr>
                                            <td style="vertical-align: middle; text-align: center;"><?= $no++ ?>.</td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $product["kode_produk"] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $product["category"] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $product["nama_produk"] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $product["stok_produk"] ?></td>
                                            <td style="vertical-align: middle; text-align: center;">Rp. <?= number_format($product["harga_produk"], 2, ',', '.') ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $product["deskripsi_produk"] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><img src="/img_product/<?= $product["foto_produk"] ?>" width="100px" alt=""></td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                <a href="/administrator/edit_product/<?= $product["id"] ?>" class="btn btn-inline btn-outline-warning btn-xs mb-3 "> <i class=" fa fa-edit"></i></a>
                                                <button class="btn btn-inline btn-outline-danger btn-xs mb-3 delete" data-toggle="modal" data-target="#modal_delete" data-id="<?= $product["id"] ?>"> <i class="fa fa-trash"></i></button>
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
                        <?= $pager->links('page_product', 'custom_pagination'); ?>
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
                <form id="product_form" autocomplete="off">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="foto_pertama" id="foto_pertama">
                    <div class="form-group">
                        <label for="category_id" class="col-form-label">Kategori : </label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value=""> -- Silahkan Pilih --</option>
                            <?php foreach ($category as $category) : ?>
                                <option value="<?= $category["id"] ?>"> <?= $category["category"] ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-danger" id="errorCategory"></small>
                    </div>
                    <div class="form-group">
                        <label for="kode_produk" class="col-form-label">Kode Produk : </label>
                        <input type="text" name="kode_produk" style="text-transform: capitalize;" id="kode_produk" class="form-control" placeholder="Masukan Nama Produk" value="<?= $kode_unique ?>">
                        <small class="text-danger" id="errorKodeProduk"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_produk" class="col-form-label">Nama Produk : </label>
                        <input type="text" name="nama_produk" style="text-transform: capitalize;" id="nama_produk" class="form-control" placeholder="Masukan Nama Produk">
                        <small class="text-danger" id="errorNamaProduk"></small>
                    </div>
                    <div class="form-group">
                        <label for="stok_produk" class="col-form-label">Stok Produk : </label>
                        <input type="number" name="stok_produk" id="stok_produk" class="form-control" placeholder="Masukan Stok Produk">
                        <small class="text-danger" id="errorStokProduk"></small>
                    </div>
                    <div class="form-group">
                        <label for="harga" class="col-form-label">Harga Produk : </label>
                        <input type="number" name="harga_produk" id="harga_produk" class="form-control" placeholder="Masukan Harga Produk">
                        <small class="text-danger" id="errorHargaProduk"></small>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_produk" class="col-form-label">Deskripsi Produk : </label>
                        <textarea name="deskripsi_produk" class="form-control" style="text-transform: capitalize;" id="deskripsi_produk" cols="30" rows="10" placeholder="Masukan Deskripsi Produk"></textarea>
                        <small class="text-danger" id="errorDeskripsiProduk"></small>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_produk" class="col-form-label">Foto Produk : </label>
                        <input type="file" name="foto_produk" accept="image/*" id="foto_produk" class="form-control">
                        <small class="text-danger" id="errorFotoProduk"></small>
                    </div>
                    <div class="form-group">
                        <img src="" alt="" id="preview_image" width="100px">
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
    $(document).ready(function() {
        $("#category_id").select2({
            theme: "bootstrap4"
        });

    })
    $("#modal_save").click(function(e) {

        $(".modal-title").html('Tambah Kategori Produk');
        $("#category_id").removeClass('is-invalid');
        $("#errorCategory").html('');
        $("#category_id").val('').trigger('change');
        $("#id").val('');
        $("#foto_pertama").val('');

        $("#nama_produk").val('');
        $("#nama_produk").removeClass('is-invalid');
        $("#errorNamaProduk").html('');

        $("#harga_produk").val('');
        $("#harga_produk").removeClass('is-invalid');
        $("#errorHargaProduk").html('');

        $("#stok_produk").val('');
        $("#stok_produk").removeClass('is-invalid');
        $("#errorStokProduk").html('');

        $("#deskripsi_produk").val('');
        $("#deskripsi_produk").removeClass('is-invalid');
        $("#deskripsi_produk").html('');

        $(".update").attr('disabled', 'disabled');
        $(".update").css('display', 'none');
        $(".save").removeAttr('disabled', 'disabled');
        $(".save").css('display', 'block');

        $("#preview_image").css('display', 'none');

    })

    $("#product_form").submit(function(e) {
        e.preventDefault();
        let category_id = $("#category_id").val();
        let kode_produk = $("#kode_produk").val();
        let nama_produk = $("#nama_produk").val();
        let harga_produk = $("#harga_produk").val();
        let stok_produk = $("#stok_produk").val();
        let deskripsi_produk = $("#deskripsi_produk").val();
        let foto_produk = $("#foto_produk").val();
        // alert(category);

        let formData = new FormData(this);
        formData.append('kode_produk', kode_produk);
        formData.append('category_id', category_id);
        formData.append('nama_produk', nama_produk);
        formData.append('stok_produk', stok_produk);
        formData.append('harga_produk', harga_produk);
        formData.append('deskripsi_produk', deskripsi_produk);
        formData.append('foto_produk', foto_produk);

        $.ajax({
            url: '/administrator/save/product',
            type: 'POST',
            data: formData,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    if (response.error.category_id) {
                        $("#category_id").addClass('is-invalid');
                        $("#errorCategory").html(response.error.category_id);
                    } else {
                        $("#category_id").removeClass('is-invalid');
                        $("#errorCategory").html('');
                    }
                    if (response.error.nama_produk) {
                        $("#nama_produk").addClass('is-invalid');
                        $("#errorNamaProduk").html(response.error.nama_produk);
                    } else {
                        $("#nama_produk").removeClass('is-invalid');
                        $("#errorNamaProduk").html('');
                    }
                    if (response.error.stok_produk) {
                        $("#stok_produk").addClass('is-invalid');
                        $("#errorStokProduk").html(response.error.stok_produk);
                    } else {
                        $("#stok_produk").removeClass('is-invalid');
                        $("#errorStokProduk").html('');
                    }
                    if (response.error.harga_produk) {
                        $("#harga_produk").addClass('is-invalid');
                        $("#errorHargaProduk").html(response.error.harga_produk);
                    } else {
                        $("#harga_produk").removeClass('is-invalid');
                        $("#errorHargaProduk").html('');
                    }
                    if (response.error.deskripsi_produk) {
                        $("#deskripsi_produk").addClass('is-invalid');
                        $("#errorDeskripsiProduk").html(response.error.deskripsi_produk);
                    } else {
                        $("#deskripsi_produk").removeClass('is-invalid');
                        $("#errorDeskripsi").html('');
                    }
                    if (response.error.foto_produk) {
                        $("#foto_produk").addClass('is-invalid');
                        $("#errorFotoProduk").html(response.error.foto_produk);
                    } else {
                        $("#foto_produk").removeClass('is-invalid');
                        $("#errorFotoProduk").html('');
                    }
                } else {
                    Swal.fire({
                        title: `${response.success}`,
                        icon: 'success'
                    });
                    setInterval(function(e) {
                        location.reload()
                    }, 1500);
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
        $("#preview_image").css('display', 'block');
        $(".modal-title").html('Ubah Kategori Produk');

        let id = $(this).data('id');

        $.ajax({
            url: '/administrator/edit/product',
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                $("#id").val(response.id);
                $("#kode_produk").val(response.kode_produk);
                $("#category_id").val(response.category_id).trigger('change');
                $("#foto_pertama").val(response.foto_produk);
                $("#nama_produk").val(response.nama_produk);
                $("#harga_produk").val(response.harga_produk);
                $("#stok_produk").val(response.stok_produk);
                $("#deskripsi_produk").val(response.deskripsi_produk);
                // $("#foto_produk").val(response.foto_produk);

                $("#preview_image").attr('src', '/img_product/' + response.foto_produk + '');
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
                    location.reload()
                }, 1500);
            }
        });
    })
</script>
<?= $this->endSection(); ?>