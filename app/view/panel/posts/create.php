<?php $this->layout_include('panel.layout.header'); ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Section -->
            <?php $this->layout_include('panel.layout.sidebar'); ?>

            <!-- Main Section -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                >
                    <h1 class="fs-3 fw-bold">ایجاد مقاله</h1>
                </div>

                <!-- Posts -->
                <div class="mt-4">
                    <form class="row g-4" method="post" enctype="multipart/form-data">
                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">عنوان مقاله</label>
                            <input name="title" type="text" class="form-control"/>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label">دسته بندی مقاله</label>
                            <select name="categories" class="form-select">
                                <?php if ($categories) {
                                    foreach ($categories as $category):
                                        ?>
                                        <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                                    <?php
                                    endforeach;
                                } ?>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <label for="formFile" class="form-label">تصویر مقاله</label>
                            <input name="picture" class="form-control" type="file"/>
                        </div>

                        <div class="col-12">
                            <label for="formFile" class="form-label">متن مقاله</label>
                            <textarea
                                    name="body"
                                    class="form-control"
                                    rows="6"
                            ></textarea>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-dark">
                                ایجاد
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
<?php $this->layout_include('panel.layout.footer'); ?>