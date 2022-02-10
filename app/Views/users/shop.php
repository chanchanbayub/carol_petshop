<?= $this->extend('/users/layout/template'); ?>
<?= $this->section('content'); ?>
<main class="main">
    <div class="page-header text-center" style="background-image: url('/users/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Produk Carol PetShop<span></span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="toolbox">
                        <div class="toolbox-right">
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            <?php foreach ($product as $product) : ?>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <a href="/detail_produk/<?= $product["kode_produk"] ?>">
                                                <img src="/img_product/<?= $product["foto_produk"] ?>" alt="Product image" class="product-image">
                                            </a>
                                            <div class="product-action">
                                                <a href="/detail_produk/<?= $product["kode_produk"] ?>" class="btn-product btn-cart"><span>Lihat Produk</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#"><?= $product["category"] ?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="/detail_produk/<?= $product["kode_produk"] ?>"><?= $product["nama_produk"] ?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                Rp. <?= number_format($product["harga_produk"], 0, ',', '.') ?>
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 -->
                            <?php endforeach; ?>
                        </div><!-- End .row -->
                    </div><!-- End .products -->


                    <!-- <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item-total">of 6</li>
                            <li class="page-item">
                                <a class="page-link page-link-next" href="#" aria-label="Next">
                                    Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav> -->
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<?= $this->endSection(); ?>