<form action="" method="GET">
    <div class="input-group mb-3 w-100">
        <input value="<?php if (isset($_GET["keyword"]))
                            echo htmlspecialchars($_GET["keyword"]);
                        else echo ""; ?>" id="keyword" name="keyword" type="text" 
                        class="form-control" placeholder="Search by name or category">
        <input type="hidden" name="page" value="<?= $_GET['page'] ?>" />
    </div>
</form>
<div class="d-flex justify-content-between">
    <div class="">
        <?php
        if ($data["total"] > 1)
            echo "Search found " . $data["total"] . " results";
        else echo "Search found " . $data["total"] . " result";
        ?>
    </div>
    <div class="mb-2 mr-2">
        <a href="/Lesson2/products/create"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a>
    </div>
</div>

<!-- Start hoverable Table rows -->
<div class="card table-wrapper-scroll-y my-custom-scrollbar">
    <div class="table-responsive text-nowrap">
        <table id="table" class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th width="20%">Category</th>
                    <th width="50%">Name</th>
                    <th width="20%">Picture</th>
                    <th width="10%">Operations</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php while ($row = mysqli_fetch_array($data["products"])) : ?>
                    <tr>
                        <td><?= $row["ProductID"] ?></td>
                        <td><?= $row["CategoryName"] ?></td>
                        <td>
                            <?= $row["ProductName"] ?>
                        </td>
                        <td>
                            <img class="text-center" width="100" height="100" src="/Lesson2/public/images/<?= $row["Image"] ?>" />
                        </td>
                        <td>
                            <a href="/Lesson2/products/update/<?= $row["ProductID"] ?>"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
                            <a href="javascript:void(0)" role="button" class="deletebtn"> <i class="fa fa-minus-circle fa-2x" aria-hidden="true"></i></a>
                            <a href="javascript:void(0)" role="button" class="copybtn"><i class="fa fa-clone fa-2x" aria-hidden="true"></i></a>
                            <a href="/Lesson2/products/show/<?= $row["ProductID"] ?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End hoverable table rows -->
<nav class="mt-2">
    <ul class="pagination">
        <?php require_once "./mvc/views/layouts/pager.php" ?>
    </ul>
</nav>

<!-- Start pagination -->

<!-- End pagination -->


<!-- Start copy modal -->
<div class="modal fade" id="copyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Copy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form name="copyForm" id="copyForm" action="" method="POST">
                <div class="modal-body">
                    <h6>Do you want to copy this product?</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- End copy modal -->

<!-- Start delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form name="deleteForm" id="deleteForm" action="" method="POST">
                <div class="modal-body">
                    <h6>Do you want to delete this product?</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End delete modal -->