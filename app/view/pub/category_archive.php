<?php
$this->layout_include('pub.layout.header',compact('categories')); ?>
<main>
    <!-- Content Section -->
    <section class="mt-4">
        <div class="row">
            <!-- Posts Content -->
            <div class="col-lg-8">
                <div class="row">
                    <div class="col">
                        <?php if (false) { ?>
                            <div class="alert alert-secondary">
                                پست های مرتبط با کلمه [ .... ]
                            </div>
                        <?php } ?>

                        <?php if (false) { ?>
                            <div class="alert alert-danger">
                                مقاله مورد نظر پیدا نشد !!!!
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="row g-3">
                    <?php if ($posts) {
                        foreach ($posts as $post):
                            ?>
                            <div class="col-sm-6">
                                <div class="card">
                                    <img
                                        <?php global $site_url; ?>
                                            src="<?php echo $site_url . $post->img; ?>"
                                            class="card-img-top"
                                            alt="post-image"/>
                                    <div class="card-body">
                                        <div
                                                class="d-flex justify-content-between">
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
                                        <div
                                                class="d-flex justify-content-between align-items-center">

                                            <a href="<?php echo $this->url("posts/single/$post->id"); ?>" class="btn btn-sm btn-dark">مشاهده</a>
                                            <p class="fs-6 mt-5 mb-0">
                                                نویسنده :
                                                <?php
                                                if ($post->persian_name) {
                                                    echo $post->persian_name;
                                                } elseif ($post->username) {
                                                    echo $post->username;
                                                } else {
                                                    echo $post->email;
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                    } ?>
                </div>
            </div>

            <!-- Sidebar Section -->
            <?php $this->layout_include('pub.layout.sidebar',compact('categories')); ?>
        </div>
    </section>
</main>

<!-- Footer Section -->
<?php $this->layout_include('pub.layout.footer'); ?>
