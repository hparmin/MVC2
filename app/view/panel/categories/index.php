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
                <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                >
                    <h1 class="fs-3 fw-bold">دسته بندی ها</h1>

                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="<?php $this->url('categories/create'); ?>" class="btn btn-sm btn-dark">
                            ایجاد دسته بندی
                        </a>
                    </div>
                </div>
                <!-- Categories -->
                <div class="mt-4">
                    <div class="table-responsive small">
                        <table class="table table-hover align-middle">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>عنوان</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($categories)) { ?>
                                <?php foreach ($categories as $category): ?>
                                    <tr>
                                        <th><?php echo $category->id; ?></th>
                                        <td><?php echo $category->title; ?></td>
                                        <td>
                                            <a href="<?php $this->url("categories/edit/$category->id"); ?>" class="btn btn-sm btn-outline-dark">ویرایش</a>
                                            <a href="<?php $this->url("categories/delete/$category->id"); ?>" class="btn btn-sm btn-outline-danger">حذف</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <tr>
                                    <td>
                                        <p>دسته بندی ای وجود ندارد</p>
                                    </td>
                                </tr>
                            <?php } ?>
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