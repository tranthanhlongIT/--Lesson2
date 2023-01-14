<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <link rel="stylesheet" href="/lesson2/public/css/bundle.css">

    <title>Lesson2</title>
</head>

<body class="mx-auto w-75" style="max-height:fit-content">
    <!-- Begin header -->
    <header>
        <?php require_once "./mvc/views/layouts/navbar.php" ?>
    </header>
    <!-- End header -->

    <!-- Begin page content -->
    <main role="main">
        <div class="container w-100">
            <?php require_once "./mvc/views/products/" . $data["view"] . ".php" ?>
        </div>
    </main>
    <!-- End page content -->

    <!-- Begin footer -->
    <footer class="footer mt-auto py-3" style="position:fixed; bottom:0px">
        <div class="container-fluid">
            <span class="text-muted">Code By Trần Thành Long</span>
        </div>
    </footer>
    <!-- End footer -->

    <!-- JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>

    <script src="/lesson2/public/js/script.js"></script>
</body>

</html>