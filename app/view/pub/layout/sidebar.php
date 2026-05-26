<div class="col-lg-4">
    <!-- Sesrch Section -->
    <div class="card">
        <div class="card-body">
            <p class="fw-bold fs-6">جستجو در وبلاگ</p>
            <form action="search.php">
                <div class="input-group mb-3">
                    <input
                            type="text"
                            class="form-control"
                            placeholder="جستجو ..."/>
                    <button
                            class="btn btn-secondary"
                            type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 640 640">
                            <path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"
                                  fill="#fff"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories Section -->
    <div class="card mt-4">
        <div class="fw-bold fs-6 card-header">دسته بندی ها</div>
        <ul class="list-group list-group-flush p-0">
            <?php foreach ($categories as $category): ?>
                <li class="list-group-item">
                    <a class="link-body-emphasis text-decoration-none"
                       href="<?php echo $this->url("categories/archive/$category->id"); ?>">
                        <?php echo $category->title; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Subscribue Section -->
    <div class="card mt-4">
        <div class="card-body">
            <p class="fw-bold fs-6">عضویت در خبرنامه</p>

            <form>
                <div class="mb-3">
                    <label class="form-label">نام</label>
                    <input type="text" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">ایمیل</label>
                    <input type="email" class="form-control"/>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-secondary">
                        ارسال
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- About Section -->
    <div class="card mt-4">
        <div class="card-body">
            <p class="fw-bold fs-6">درباره ما</p>
            <p class="text-justify">
                لورم ایپسوم متن ساختگی با تولید سادگی
                نامفهوم از صنعت چاپ و با استفاده از
                طراحان گرافیک است. چاپگرها و متون بلکه
                روزنامه و مجله در ستون و سطرآنچنان که
                لازم است و برای شرایط فعلی تکنولوژی مورد
                نیاز و کاربردهای متنوع با هدف بهبود
                ابزارهای کاربردی می باشد.
            </p>
        </div>
    </div>
</div>