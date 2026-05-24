<?php
$this->layout_include('panel.layout.header');
?>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Section -->
            <?php
            $this->layout_include('panel.layout.sidebar');
            ?>
            <!-- Main Section -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
                <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                >
                    <h1 class="fs-3 fw-bold">ویرایش اطلاعات کاربری</h1>
                </div>
                <!-- Posts -->
                <div class="mt-4">
                    <form method="post" class="row g-4">
                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">ایمیل</label>
                            <input
                                    name="email"
                                    type="text"
                                    class="form-control"
                                    value="<?php echo $user->email; ?>"/>
                            <?php if (isset($_GET['email']) && $_GET['email']) { ?>
                                <p class="text-danger">ایمیل وارد شده توسط شخص دیگری انتخاب شده بود.</p>
                            <?php } ?>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">نام کاربری</label>
                            <input
                                    name="username"
                                    type="text"
                                    class="form-control"
                                    value="<?php echo $user->username; ?>"/>
                            <?php if (isset($_GET['username']) && $_GET['username']) { ?>
                                <p class="text-danger">نام کاربری وارد شده توسط شخص دیگری انتخاب شده بود.</p>
                            <?php } ?>
                        </div>


                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">نام فارسی</label>
                            <input
                                    name="persian_name"
                                    type="text"
                                    class="form-control"
                                    value="<?php echo $user->persian_name; ?>"/>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <button type="submit" class="btn btn-dark">
                                ویرایش
                            </button>
                        </div>
                    </form>

                </div>
            </main>
        </div>
    </div>
<?php
$this->layout_include('panel.layout.footer');
?>