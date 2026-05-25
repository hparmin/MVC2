<?php
$this->layout_include('pub.layout.header',compact('categories'));
?>
<main>
    <!-- Slider Section -->
    <section>
        <div id="carousel" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner rounded">
                <div class="carousel-item overlay carousel-height active">
                    <img src="<?php echo $this->asset('images/1.jpg'); ?>" class="d-block w-100" alt="post-image"/>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>لورم ایپسوم متن</h5>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی
                            نامفهوم از صنعت چاپ و با استفاده
                        </p>
                    </div>
                </div>
                <div class="carousel-item carousel-height overlay">
                    <img
                            src="<?php echo $this->asset('images/2.jpg'); ?>"
                            class="d-block w-100"
                            alt="post-image"
                    />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>لورم ایپسوم متن</h5>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی
                            نامفهوم از صنعت چاپ و با استفاده
                        </p>
                    </div>
                </div>
                <div class="carousel-item carousel-height overlay">
                    <img
                            src="<?php echo $this->asset('images/3.jpg'); ?>"
                            class="d-block w-100"
                            alt="post-image"
                    />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>لورم ایپسوم متن</h5>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی
                            نامفهوم از صنعت چاپ و با استفاده
                        </p>
                    </div>
                </div>
            </div>
            <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#carousel"
                    data-bs-slide="prev"
            >
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#carousel"
                    data-bs-slide="next"
            >
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Content Section -->
    <section class="mt-4">
        <div class="row">
            <!-- Posts Content -->
            <div class="col-lg-8">
                <div class="row g-3">
                    <?php foreach ($posts as $post): ?>
                        <div class="col-sm-6">
                            <div class="card">
                                <img <?php global $site_url; ?>
                                        src="<?php echo $site_url . $post->img; ?>" class="card-img-top"
                                        alt="post-image">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title fw-bold">
                                            <?php echo $post->title; ?>
                                        </h5>
                                        <div>
                                            <span class="badge text-bg-secondary"><?php echo $post->category_title; ?></span>
                                        </div>
                                    </div>
                                    <p class="card-text text-secondary pt-3 lines-5-limit">
                                       <?php echo $post->body; ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="<?php echo $this->url("posts/single/$post->id"); ?>" class="btn btn-sm btn-dark">مشاهده</a>

                                        <p class="fs-7 mb-0">
                                            نویسنده : <?php echo $post->persian_name; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center flex-md-row-reverse">
                            <li class="page-item disabled">
                                <a class="page-link" href="#">قبلی</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" tabindex="-1">بعدی</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Sidebar Section -->
            <?php $this->layout_include('pub.layout.sidebar'); ?>
        </div>
    </section>
</main>
<!-- Footer Section -->
<?php $this->layout_include('pub.layout.footer'); ?>
