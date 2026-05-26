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
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="fs-3 fw-bold">کامنت ها</h1>
            </div>
            <!-- Comments -->
            <div class="mt-4">
                <div class="table-responsive small">
                    <table class="table table-hover align-middle">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>نام</th>
                            <th>متن کامنت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($comments) {
                            foreach ($comments as $comment): ?>
                                <tr>
                                    <th><?php echo $comment->id; ?></th>
                                    <td><?php
                                        if ($comment->persian_name) {
                                            echo $comment->persian_name;
                                        } elseif ($comment->username) {
                                            echo $comment->username;
                                        } else {
                                            echo $comment->email;
                                        }
                                        ?></td>
                                    <td>
                                        <?php echo $comment->body; ?>
                                    </td>
                                    <td>
                                        <?php if ($comment->status == "publish") { ?>
                                            <a href="#" class="btn btn-sm btn-outline-dark disabled">تایید شده</a>
                                            <a href="<?php echo $this->url("comments/remove/$comment->id"); ?>"
                                               class="btn btn-sm btn-outline-danger">حذف</a>
                                        <?php } else { ?>
                                            <a href="#" class="btn btn-sm btn-outline-info">در انتظار تایید</a>
                                            <a href="<?php echo $this->url("comments/remove/$comment->id"); ?>"
                                               class="btn btn-sm btn-outline-danger">حذف</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach;
                        } else {
                            ?>
                        <tr>
                            <td>کامنتی یافت نشد</td>
                        </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
<?php
$this->layout_include('panel.layout.footer');
?>
