<div class="mx-auto col-xl-6 col-lg-8 col-12">
    <div class="card mb-3">
        <!-- Render title -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= $data["title"] ?></h5>
        </div>

        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">

                <!-- Fetch data for update or view detail -->
                <?php if ($data["action"] == 'update' || $data["action"] == 'detail')
                    $productRow = mysqli_fetch_array($data["product"]);
                ?>

                <!-- Input text name -->
                <div class="mb-2">
                    <label class="form-label" for="basic-icon-default-fullname">Name</label>
                    <div class="input-group input-group-merge">
                        <input value="<?php
                                        if ($data["action"] == 'update' || $data["action"] == 'detail')
                                            echo $productRow["ProductName"];
                                        ?>" <?php
                                            if ($data["action"] == 'detail')
                                                echo 'disabled';
                                            ?> type="text" class="form-control" name="productName" id="productName" maxlength="30" required>
                    </div>
                </div>

                <!-- Select category -->
                <div class="mb-2">
                    <label class="form-label" for="basic-icon-default-company">Category</label>
                    <div class="input-group mb-2">
                        <select <?php
                                if ($data["action"] == 'detail')
                                    echo 'disabled';
                                ?> class="custom-select" id="categoryID" name="categoryID" required>
                            <option value="<?php if ($data["action"] == 'update' || $data["action"] == 'detail')
                                                echo $productRow["CategoryID"] ?>" select>
                                <?php
                                if ($data["action"] == 'update' || $data["action"] == 'detail')
                                    echo $productRow["CategoryName"];
                                else echo 'Choose...';
                                ?>
                            </option>

                            <?php while ($categoryRow = mysqli_fetch_array($data["categories"])) : ?>
                                <option value="<?= $categoryRow["CategoryID"] ?>"><?= $categoryRow["CategoryName"] ?></option>
                            <?php endwhile ?>
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="categoryID">Options</label>
                        </div>
                    </div>
                </div>

                <!-- Input image -->
                <div class="mb-2">
                    <label class="form-label" for="basic-icon-default-phone">Image</label>
                    <div class="input-group mb-2">
                        <div class="custom-file">
                            <input <?php
                                    if ($data["action"] == 'detail')
                                        echo 'disabled';
                                    ?> type="file" class="custom-file-input" name="image" id="image" accept="image/png, image/jpeg">
                            <label class="custom-file-label" for="image" required>
                                <?php
                                if ($data["action"] == 'update' || $data["action"] == 'detail')
                                    echo $productRow["Image"];
                                else echo '';
                                ?>
                            </label>
                        </div>
                        <input value="<?php
                                        if ($data["action"] == 'update' || $data["action"] == 'detail')
                                            echo $productRow["Image"];
                                        else echo '';
                                        ?>" type="hidden" name="imageURL">
                    </div>
                </div>

                <!-- Submit Button and back button -->
                <div class="text-right mt-4">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary w-25" <?php if ($data["action"] === 'detail') echo 'hidden' ?>>
                        <?php
                        if ($data["action"] == 'create') {
                            echo 'Add';
                        } else if ($data["action"] == 'update') {
                            echo 'Edit';
                        } ?>
                    </button>
                    <a href="/Lesson2/Products/index" class="btn btn-warning w-25">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>