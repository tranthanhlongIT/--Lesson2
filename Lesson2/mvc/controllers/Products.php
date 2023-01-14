<?php

class Products extends BaseController
{
    function index()
    {
        if (empty($_GET["page"])) {
            Utils::redirect("/lesson2/products?page=1");
        }

        $product = $this->model("ProductModel");

        $pagination = $product->pagination($_GET["page"], isset($_GET["keyword"]) ? $_GET["keyword"] : null);

        if (isset($_GET["keyword"])) {
            $data = [
                "view" => "index",
                "total" => $product->getByKeyword($_GET["keyword"])->num_rows,
                "products" => $pagination["products"],
                "current_page" => $pagination["current_page"],
                "total_page" => $pagination["total_page"]
            ];
        } else {
            $data = [
                "view" => "index",
                "total" => $product->getAll()->num_rows,
                "products" => $pagination["products"],
                "current_page" => $pagination["current_page"],
                "total_page" => $pagination["total_page"]
            ];
        }

        $this->view("layouts/master_layout", $data);

        if (isset($_SESSION["toast_type"])) {
            Utils::showToast($_SESSION["toast_type"], $_SESSION["toast_message"]);
            session_unset();
        }
    }

    function show($id)
    {
        $product = $this->model("ProductModel");
        $category = $this->model("CategoryModel");

        $data = [
            "product" => $product->getDetail($id),
            "categories" => $category->getAll(),
            "view" => "dynamic-form",
            "title" => "Product Details",
            "action" => "detail"
        ];

        $this->view("layouts/master_layout", $data);
    }

    function create()
    {
        $category = $this->model("CategoryModel");
        $product = $this->model("ProductModel");

        $data = [
            "categories" => $category->getAll(),
            "view" => "dynamic-form",
            "title" => "Add Product",
            "action" => "create"
        ];

        if (isset($_POST["submit"])) {
            if (isset($_FILES["image"]) && isset($_POST["imageURL"]) == false) {
                Utils::uploadImage();
            }

            $object = [
                'categoryID' => $_POST["categoryID"],
                'productName' => $_POST["productName"],
                'image' => $_FILES["image"]["name"] ? $_FILES["image"]["name"] : null
            ];

            if ($product->create($object)) {
                $this->view("layouts/master_layout", $data);
                Utils::showToast('success', 'Add successful');
            } else {
                $this->view("layouts/master_layout", $data);
                Utils::showToast('dangerous', 'Add failed');
            }
        }
        $this->view("layouts/master_layout", $data);
    }

    function update($id)
    {
        $category = $this->model("CategoryModel");
        $product = $this->model("ProductModel");

        $data = [
            "product" => $product->getDetail($id),
            "categories" => $category->getAll(),
            "view" => "dynamic-form",
            "title" => "Edit Product",
            "action" => "update"
        ];

        if (isset($_POST["submit"])) {
            if (isset($_FILES["image"]) && isset($_POST["imageURL"]) == false) {
                Utils::uploadImage();
            }

            $object = [
                'productID' => $id,
                'categoryID' => $_POST["categoryID"],
                'productName' => $_POST["productName"],
                'image' => $_FILES["image"]["name"] ? $_FILES["image"]["name"] : $_POST["imageURL"]
            ];

            if ($product->update($object)) {
                $data = [
                    "product" => $product->getDetail($id),
                    "categories" => $category->getAll(),
                    "view" => "dynamic-form",
                    "title" => "Edit Product",
                    "action" => "update"
                ];
                $this->view("layouts/master_layout", $data);
                Utils::showToast('success', 'Update successful');
            } else {
                $this->view("layouts/master_layout", $data);
                Utils::showToast('error', 'Update failed');
            }
        }
        $this->view("layouts/master_layout", $data);
    }

    function delete($id)
    {
        if (isset($_POST["submit"])) {
            $product = $this->model("ProductModel");

            if ($product->destroy($id)) {
                Utils::createToastSession("success", "Delete successful");
                Utils::redirect("/lesson2/products");
            } else {
                Utils::createToastSession("error", "Delete failed");
                Utils::redirect("/lesson2/products");
            }
        }
    }

    function copy($id)
    {
        if (isset($_POST["submit"])) {
            $product = $this->model("ProductModel");
            $row = mysqli_fetch_array($product->getDetail($id));

            $object = [
                'categoryID' => $row["CategoryID"],
                'productName' => $row["ProductName"],
                'image' => $row["Image"]
            ];

            if ($product->create($object)) {
                Utils::createToastSession("success", "Copy successful");
                Utils::redirect("/lesson2/products");
            } else {
                Utils::createToastSession("error", "Copy failed");
                Utils::redirect("/lesson2/products");
            }
        }
    }
}
