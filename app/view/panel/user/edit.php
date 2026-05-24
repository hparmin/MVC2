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
                    <h1 class="fs-3 fw-bold">ویرایش مقاله</h1>
                </div>
                <!-- Posts -->
                <div class="mt-4">
                    <?php if ($post) { ?>
                        <form method="post" enctype="multipart/form-data" class="row g-4">
                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label">عنوان مقاله</label>
                                <input
                                        name="title"
                                        type="text"
                                        class="form-control"
                                        value="<?php echo $post->title; ?>"
                                />
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label">دسته بندی مقاله</label>
                                <select name="categories" class="form-select">
                                    <?php foreach ($all_categories as $category) { ?>
                                        <option
                                            <?php
                                            if ($category->id == $post->categories) {
                                                echo "selected";
                                            }
                                            ?>
                                                value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <label for="formFile" class="form-label">تصویر مقاله</label>
                                <input name="picture" class="form-control" type="file"/>
                            </div>
                            <div class="col-12">
                                <label for="formFile" class="form-label">متن مقاله</label>
                                <textarea name="body" class="form-control"
                                          rows="8"><?php echo $post->body; ?></textarea>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <?php global $project_directory; ?>
                                <img class="rounded" src="<?php echo $project_directory . $post->img; ?>" width="300"/>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark">
                                    ویرایش
                                </button>
                            </div>
                        </form>
                    <?php }else{
                    ?>
                    <p>
                        <?php
                        echo "مقاله پیدا نشد.";
                        } ?>
                    </p>
                </div>
            </main>
        </div>
    </div>
<?php
$this->layout_include('panel.layout.footer');
?>