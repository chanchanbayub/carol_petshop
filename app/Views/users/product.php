<?= $this->extend('/users/layout/template'); ?>
<?= $this->section('content'); ?>
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <nav class="product-pager ml-auto" aria-label="Product">
            </nav><!-- End .pager-nav -->
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="/img_product/<?= $produk["foto_produk"] ?>" data-zoom-image="/img_product/<?= $produk["foto_produk"] ?>" alt="image produk">
                                </figure><!-- End .product-main-image -->

                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details product-details-centered">
                            <h1 class="product-title"> <?= $produk["nama_produk"] ?> </h1><!-- End .product-title -->

                            <div class="ratings-container">

                            </div><!-- End .rating-container -->

                            <div class="product-price">
                                Rp. <?= number_format($produk["harga_produk"], '0', ',', '.') ?>
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p><?= $produk["category"] ?></p>
                            </div><!-- End .product-content -->

                            <div class="details-filter-row details-row-size">
                                <label for="size">Stock : </label>


                                <a href="#" class="size-guide"><i class="icon-arrow-right"></i><?= $produk["stok_produk"] ?></a>
                            </div><!-- End .details-filter-row -->

                            <div class="product-details-action">
                                <div class="details-action-row">
                                    <div class="product-details-quantity">

                                    </div><!-- End .product-details-quantity -->

                                    <a href="whatsapp://send?text=Hai Apakah Produk <?= $produk["nama_produk"] ?> Harga Rp. <?= number_format($produk["harga_produk"], '0', ',', '.') ?> Masih Tersedia? &phone=+6282117620764" class="btn-product btn-cart"><span> Order Via Whatsapp </span></a>
                                    OR
                                    <a href="tel:6282117620764" class="btn-product btn-cart"><span> Telpon Seller </span></a>
                                </div><!-- End .details-action-col -->

                            </div><!-- End .product-details-action -->

                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Kategory:</span>
                                    <a href="#"><?= $produk["category"] ?></a>,

                                </div><!-- End .product-cat -->

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Follow Instagram :</span>
                                    <a href="#" class="social-icon" title="instagram" target="_blank"><i class="icon-instagram"></i></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Deskripsi Produk</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3><?= $produk["nama_produk"] ?></h3>
                            <p> <?= $produk["deskripsi_produk"] ?> </p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                </div>
            </div><!-- End .page-content -->
</main><!-- End .main -->
<!-- Close Content -->
<?= $this->endSection(); ?>