<?= $this->extend('/users/layout/template'); ?>
<?= $this->section('content'); ?>
<main class="main">
    <div class="intro-slider-container mb-0">
        <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{"nav": false, "dots": false}'>
            <div class="intro-slide" style="background-image: url(/assets/banner.png);">
                <div class="container intro-content text-center">
                    <h3 class="intro-subtitle text-white">Selamat Datang</h3><!-- End .h3 intro-subtitle -->
                    <h1 class="intro-title text-white">Carol Petshop</h1><!-- End .intro-title -->
                    <div class="intro-text text-white">Online Shop</div><!-- End .intro-text -->
                    <a href="/shop" class="btn btn-primary"> <i class="icon-shopping-cart"></i> Belanja Sekarang</a>
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
        </div><!-- End .intro-slider owl-carousel owl-theme -->

        <span class="slider-loader text-white"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->
    <div class="row justify-content-center">
        <div class="col-sm-6 col-lg-4">
            <div class="icon-box icon-box-side">
                <span class="icon-box-icon text-dark">
                    <i class="icon-rocket"></i>
                </span>

                <div class="icon-box-content">
                    <h3 class="icon-box-title">Gratis Ongkir</h3><!-- End .icon-box-title -->
                    <p>Gratis Ongkir Untuk Wilayah DKI Jakarta dan Sekitarnya</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box -->
        </div><!-- End .col-sm-6 col-lg-4 -->

        <div class="col-sm-6 col-lg-4">
            <div class="icon-box icon-box-side">
                <span class="icon-box-icon text-dark">
                    <i class="icon-refresh"></i>
                </span>

                <div class="icon-box-content">
                    <h3 class="icon-box-title">Fast Respons</h3><!-- End .icon-box-title -->
                    <p>Kami Menjamin Chat Pasti Langsung di Balas Secepatnya</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box -->
        </div><!-- End .col-sm-6 col-lg-4 -->

        <div class="col-sm-6 col-lg-4">
            <div class="icon-box icon-box-side">
                <span class="icon-box-icon text-dark">
                    <i class="icon-life-ring"></i>
                </span>

                <div class="icon-box-content">
                    <h3 class="icon-box-title">Produk Original</h3><!-- End .icon-box-title -->
                    <p>Kami Menjamin Produk Yang Kami Pasar kan dijamin Original</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box -->
        </div><!-- End .col-sm-6 col-lg-4 -->
    </div>
    <!-- End .row -->


    <div class="mb-4"></div><!-- End .mb-6 -->

    <div class="container">
        <div class="heading heading-center mb-3">
            <h2 class="title">Produk Terbaru</h2><!-- End .title -->
            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">Semua Produk Terbaru</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                <div class="products">
                    <div class="row justify-content-center">
                        <?php foreach ($newProduct as $data) : ?>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <a href="/detail_produk/<?= $data["kode_produk"] ?>">
                                            <img src="/img_product/<?= $data["foto_produk"] ?>" alt="Product image" width="350px" height="350px" class="product-image">
                                        </a>

                                        <div class="product-action product-action-transparent">
                                            <a href="/detail_produk/<?= $data["kode_produk"] ?>" class="btn-product btn-cart"><span>Lihat Produk</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#"></a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="/detail_produk/<?= $data["kode_produk"] ?>"><?= $data["nama_produk"] ?></a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">Rp. <?= number_format($data["harga_produk"], '0', ',', '.') ?> </span>
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        <?php endforeach; ?>
                    </div><!-- End .row -->
                </div><!-- End .products -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .heading -->

    </div><!-- End .container -->
    <div class="pt-6 pb-6" style="background-color: #fff;">
        <div class="container">
            <div class="banner-set">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-set-content text-center">
                            <div class="set-content-wrapper">
                                <h4>Spesial Promo</h4>
                                <h2>Kategori Makanan Hewan</h2>

                                <p>Sayang Peliharaan Anda Dengan Pakan Yang Bergizi <br> dan menyehatkan peliharaan anda </p>

                                <div class="banner-set-products">
                                    <div class="row">
                                        <div class="products">
                                            <?php foreach ($produkLama as $produkData) : ?>
                                                <div class="col-6">
                                                    <div class="product product-2 text-center">
                                                        <figure class="product-media">
                                                            <a href="/detail_produk/<?= $produkData["kode_produk"] ?>">
                                                                <img src="/img_product/<?= $produkData["foto_produk"] ?>" alt="Product image" class="product-image">
                                                            </a>
                                                        </figure><!-- End .product-media -->

                                                        <div class="product-body">
                                                            <h3 class="product-title"><a href="#"><?= $produkData["nama_produk"] ?></a></h3><!-- End .product-title -->
                                                            <div class="product-price">
                                                                Rp <?= number_format($produkData["harga_produk"], '0', ',', '.') ?>
                                                            </div><!-- End .product-price -->
                                                        </div><!-- End .product-body -->
                                                    </div><!-- End .product -->
                                                </div><!-- End .col-sm-6 -->
                                            <?php endforeach; ?>
                                        </div>
                                    </div><!-- End .row -->
                                </div><!-- End .banner-set-products -->
                            </div><!-- End .set-content-wrapper -->
                        </div><!-- End .banner-set-content -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .banner-set -->
        </div><!-- End .container -->
    </div><!-- End .bg-lighter pt6 pb-6 -->

    <div class="container pt-6 new-arrivals">
        <div class="heading heading-center mb-3">
            <h2 class="title">Daftar Produk</h2><!-- End .title -->
            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">Semua Produk Terbaru</a>
                </li>
            </ul>
        </div><!-- End .heading -->

        <div class="tab-content">

            <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                <div class="products">
                    <div class="row justify-content-center">
                        <?php foreach ($product as $produk) : ?>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <a href="/detail_produk/<?= $produk["kode_produk"] ?>">
                                            <img src="/img_product/<?= $produk["foto_produk"] ?>" alt="Product image" class="product-image">
                                        </a>
                                        <div class="product-action product-action-transparent">
                                            <a href="whatsapp://send?text=Hai Apakah Produk <?= $produk["nama_produk"] ?> Harga Rp. <?= number_format($produk["harga_produk"], '0', ',', '.') ?> Masih Tersedia? &phone=+6282117620764" class="btn-product "><span> <i class="icon-whatsapp"></i> Order Via Wa</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#"><?= $produk["category"] ?></a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="#"><?= $produk["nama_produk"] ?></a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">Rp <?= number_format($produk["harga_produk"], '0', ',', '.') ?></span>
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        <?php endforeach; ?>
                    </div><!-- End .row -->
                </div><!-- End .products -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane p-0 fade" id="new-access-tab" role="tabpanel" aria-labelledby="new-access-link">
                <div class="products">
                    <div class="row justify-content-center">

                    </div><!-- End .row -->
                </div><!-- End .products -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .container -->

    <div class="mb-2"></div><!-- End .mb-2 -->

    <div class="container">
        <div class="cta cta-separator mb-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-wrapper cta-text text-center">
                        <h3 class="cta-title">Ikuti Sosial Media Kami</h3><!-- End .cta-title -->
                        <p class="cta-desc">Dapatkan Infomasi mengenai Produk Terbaru Dari Kami </p><!-- End .cta-desc -->

                        <div class="social-icons social-icons-colored justify-content-center">
                            <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                            <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                            <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                            <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                        </div><!-- End .soial-icons -->
                    </div><!-- End .cta-wrapper -->
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->
        </div><!-- End .cta -->
    </div><!-- End .container -->
</main><!-- End .main -->
<?= $this->endSection(); ?>