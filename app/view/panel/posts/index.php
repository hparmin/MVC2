<?php
$this->layout_include('panel.layout.header');
global $site_url; ?>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Section -->
        <?php $this->layout_include('panel.layout.sidebar'); ?>
        <!-- Main Section -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="fs-3 fw-bold">مقالات</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="<?php $this->url('posts/create'); ?>" class="btn btn-sm btn-dark">
                        ایجاد مقاله
                    </a>
                </div>
            </div>
            <!-- Posts -->
            <div class="mt-4">
                <div class="table-responsive small">
                    <table class="table table-hover align-middle">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>عنوان</th>
                            <th>نویسنده</th>
                            <th>دسته بندی ها</th>
                            <th>تصویر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($posts as $post) { ?>
                            <tr>
                                <th><?php echo $post->id; ?></th>
                                <td><div class="three-line-code"><a style="color:#000;" href="<?php echo $this->url("posts/single/$post->id"); ?>"><?php echo $post->title; ?></a></div></td>
                                <td><?php
                                    foreach ($users as $user){
                                        if ($user->id == $post->author){
                                            echo $this->find_user_nickname($user);
                                        }
                                    }
                                    ?></td>
                                <td><?php foreach ($categories as $category){
                                    if ($category->id == $post->categories){
                                        echo $category->title;
                                    }
                                    }?></td>
                                <td>
                                    <img style="max-width: 150px; max-height: 100px; border-radius: 10px;" src="<?php echo $site_url.$post->img; ?>" alt="">
                                </td>
                                <td>
                                    <a href="<?php echo $this->url("posts/edit/$post->id"); ?>" class="btn btn-sm btn-outline-dark">ویرایش</a>
                                    <a href="<?php echo $this->url("posts/delete/$post->id"); ?>" class="btn btn-sm btn-outline-danger">حذف</a>
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
<?php $this->layout_include('panel.layout.footer'); ?>
