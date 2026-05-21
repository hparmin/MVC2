<?php $this->layout_include('pub.layout.header'); ?>
<main class="form-signin w-40 m-auto">
    <form method="post" class="custom-armin-login-form">
        <div class="fs-9 fw-bold text-center mb-4">
            صفحه ثبت نام
        </div>
        <hr>
        <div class="mb-3">
            <label class="form-label">ایمیل</label>
            <input type="email" name="email" class="form-control"/>
            <?php
            if (isset($err['email'])) {
                ?>
                <i class="register_page_error">
                    <?php
                    echo $err['email'];
                    ?>
                </i>
                <?php
            }
            ?>
        </div>
        <div class="mb-3">
            <label class="form-label">رمز عبور</label>
            <input type="password" name="password" class="form-control"/>
        </div>
        <div class="mb-3">
            <label class="form-label">تکرار رمز عبور</label>
            <input type="password" name="tfc_password" class="form-control"/>
        </div><?php
        if (isset($err['password'])) {
            ?>
            <i class="register_page_error">
                <?php
                echo $err['password'];
                ?>
            </i>
            <?php
        }
        if (isset($err['password'])) {
            echo "<br>";
            echo "<br>";
        }
        ?>
        <a href="<?php $this->url('users/login'); ?>">
            حساب کاربری دارید؟ اینجا کلیک کنید.
        </a>
        <button class="w-100 btn btn-dark mt-4" type="submit">
            ثبت نام
        </button>
    </form>
</main>

<?php $this->layout_include('pub.layout.footer'); ?>
