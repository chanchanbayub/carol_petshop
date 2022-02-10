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
                            <h3 class="card-title"> Edit Product </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow: auto;">
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="product_form" autocomplete="off">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="id" id="id" value="<?= $product["id"] ?>">
                                        <input type="hidden" name="foto_pertama" id="foto_pertama" value="<?= $product["foto_produk"] ?>">
                                        <div class="form-group">
                                            <label for="kode_produk" class="col-form-label">Kode Produk : </label>
                                            <input type="text" name="kode_produk" style="text-transform: capitalize;" id="kode_produk" class="form-control" value="<?= $product["kode_produk"] ?>" placeholder="Masukan Nama Produk">
                                            <small class="text-danger" id="errorKodeProduk"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id" class="col-form-label">Kategori : </label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value=""> -- Silahkan Pilih --</option>
                                                <?php foreach ($category as $category) : ?>
                                                    <?php if ($product["category_id"] == $category["id"]) : ?>
                                                        <option value="<?= $category["id"] ?>" selected> <?= $category["category"] ?> </option>
                                                    <?php else : ?>
                                                        <option value="<?= $category["id"] ?>"> <?= $category["category"] ?> </option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger" id="errorCategory"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_produk" class="col-form-label">Nama Produk : </label>
                                            <input type="text" name="nama_produk" style="text-transform: capitalize;" id="nama_produk" class="form-control" placeholder="Masukan Nama Produk" value="<?= $product["nama_produk"] ?>">
                                            <small class="text-danger" id="errorNamaProduk"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="stok_produk" class="col-form-label">Stok Produk : </label>
                                            <input type="number" name="stok_produk" id="stok_produk" class="form-control" placeholder="Masukan Stok Produk" value="<?= $product["stok_produk"] ?>">
                                            <small class="text-danger" id="errorStokProduk"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga" class="col-form-label">Harga Produk : </label>
                                            <input type="number" name="harga_produk" id="harga_produk" class="form-control" placeholder="Masukan Harga Produk" value="<?= $product["harga_produk"] ?>">
                                            <small class="text-danger" id="errorHargaProduk"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi_produk" class="col-form-label">Deskripsi Produk : </label>
                                            <textarea name="deskripsi_produk" class="form-control" style="text-transform: capitalize;" id="deskripsi_produk" cols="30" rows="10" placeholder="Masukan Deskripsi Produk"> <?= $product["deskripsi_produk"] ?> </textarea>
                                            <small class="text-danger" id="errorDeskripsiProduk"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="foto_produk" class="col-form-label">Foto Produk : </label>
                                            <input type="file" name="foto_produk" accept="image/*" id="foto_produk" class="form-control">
                                            <small class="text-danger" id="errorFotoProduk"></small>
                                        </div>
                                        <div class="form-group">
                                            <img src="/img_product/<?= $product["foto_produk"] ?>" alt="" width="100px">
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="reset" class="btn btn-outline-danger"><i class="fa fa-window-close"></i> reset</button>
                                            <button type="submit" class="btn btn-outline-dark update"> <i class=" fa fa-check"></i> Update</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>

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

<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#category_id").select2({
            theme: "bootstrap4"
        });
    });
    $("#product_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id").val();
        let foto_pertama = $("#foto_pertama").val();
        let category_id = $("#category_id").val();
        let kode_produk = $("#kode_produk").val();
        let nama_produk = $("#nama_produk").val();
        let harga_produk = $("#harga_produk").val();
        let stok_produk = $("#stok_produk").val();
        let deskripsi_produk = $("#deskripsi_produk").val();
        let foto_produk = $("#foto_produk").val();

        let formData = new FormData(this);
        formData.append('id', id);
        formData.append('foto_pertama', foto_pertama);
        formData.append('kode_produk', kode_produk);
        formData.append('category_id', category_id);
        formData.append('nama_produk', nama_produk);
        formData.append('stok_produk', stok_produk);
        formData.append('harga_produk', harga_produk);
        formData.append('deskripsi_produk', deskripsi_produk);
        formData.append('foto_produk', foto_produk);

        $.ajax({
            url: '/administrator/update/product',
            type: 'POST',
            data: formData,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            beforeSend: function() {
                $(".update").attr('disabled', 'disabled');
            },
            success: function(response) {
                $(".update").removeAttr('disabled', 'disabled');
                Swal.fire({
                    title: `${response.success}`,
                    icon: 'success'
                });
                setInterval(function(e) {
                    location.href = `${response.url}`
                }, 1000);
            }
        });
    });
</script>
<?= $this->endSection(); ?>