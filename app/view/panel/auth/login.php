<?php $this->layout_include('pub.layout.header',compact('categories'));
if (isset($_SESSION['login'])){
    $this->route('panel');
}
?>
    <main class="form-signin w-40 m-auto">
        <form method="post" class="custom-armin-login-form">
            <div class="fs-9 fw-bold text-center mb-4">
            صفحه ورود
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
            <input name="password" type="password" class="form-control"/>
            <?php
            if (isset($err['password'])) {
                ?>
                <i class="register_page_error">
                    <?php
                    echo $err['password'];
                    ?>
                </i>
                <?php
            }
            ?>
        </div>
        <a href="<?php $this->url('users/register'); ?>">
            اگر حساب کاربری ندارید اینجا کلیک کنید.
        </a>
        <button class="w-100 btn btn-dark mt-4" type="submit">
            ورود
        </button>
    </form>
</main>
<?php $this->layout_include('pub.layout.footer'); ?>