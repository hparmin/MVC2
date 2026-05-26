<?php
$this->layout_include('pub.layout.header', compact('categories'));
?>
<main>
    <!-- Content -->
    <section class="mt-4">
        <div class="row">
            <!-- Posts & Comments Content -->
            <div class="col-lg-8">
                <div class="row justify-content-center">
                    <!-- Post Section -->
                    <div class="col">
                        <div class="card">
                            <?php global $site_url; ?>
                            <img src="<?php echo $site_url . $post->img; ?>"
                                 class="card-img-top"
                                 alt="post-image"/>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title fw-bold">
                                        <?php echo $post->title; ?>
                                    </h5>
                                    <div>
                                        <a href="<?php $this->url("categories/archive/$post->category_id"); ?>">
                                            <span class="badge text-bg-secondary">
                                                <?php echo $post->category_title; ?>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <p class="card-text text-secondary text-justify pt-3">
                                    <?php echo $post->body; ?>
                                </p>
                                <div>
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
                    <hr class="mt-4"/>
                    <!-- Comment Section -->
                    <div class="col">
                        <!-- Comment Form -->
                        <div class="card">
                            <div class="card-body">
                                <p class="fw-bold fs-5">
                                    ارسال کامنت
                                </p>
                                <?php if ($_SESSION['login']) { ?>
                                    <form method="post" action="<?php
                                    global $site_url;
                                    echo $site_url."comments/insert";
                                    ?>">
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label">نام</label>-->
<!--                                            <input type="text" class="form-control"/>-->
<!--                                        </div>-->
                                        <div class="mb-3">
                                            <label class="form-label">متن کامنت</label>
                                            <textarea name="comment_text" class="form-control" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-dark">
                                            ارسال
                                        </button>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                        <hr class="mt-4"/>
                        <!-- Comment Content -->
                        <p class="fw-bold fs-6">تعداد کامنت : 3</p>
                        <div class="card bg-light-subtle mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <img src="./assets/images/profile.png" width="45" height="45" alt="user-profle"/>
                                    <h5 class="card-title me-2 mb-0">
                                        محمد صالحی
                                    </h5>
                                </div>
                                <p class="card-text pt-3 pr-3">
                                    لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم از صنعت چاپ و با
                                    استفاده از طراحان گرافیک است.
                                </p>
                            </div>
                        </div>

                        <div class="card bg-light-subtle mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <img
                                            src="./assets/images/profile.png"
                                            width="45"
                                            height="45"
                                            alt="user-profle"
                                    />

                                    <h5
                                            class="card-title me-2 mb-0"
                                    >
                                        متین سیدی
                                    </h5>
                                </div>

                                <p class="card-text pt-3 pr-3">
                                    لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم از صنعت چاپ
                                </p>
                            </div>
                        </div>

                        <div class="card bg-light-subtle mb-3">
                            <div class="card-body">
                                <div
                                        class="d-flex align-items-center"
                                >
                                    <img
                                            src="./assets/images/profile.png"
                                            width="45"
                                            height="45"
                                            alt="user-profle"
                                    />

                                    <h5
                                            class="card-title me-2 mb-0"
                                    >
                                        زهرا عزیزی
                                    </h5>
                                </div>

                                <p class="card-text pt-3 pr-3">
                                    لورم ایپسوم متن ساختگی با تولید
                                    سادگی
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Section -->
            <?php $this->layout_include('pub.layout.sidebar', compact('categories')); ?>
        </div>
    </section>
</main>

<!-- Footer -->
<?php $this->layout_include('pub.layout.footer'); ?>
