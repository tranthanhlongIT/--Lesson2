<?php

class Utils
{
    static function uploadImage()
    {
        $target_dir = "public/images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                return true;
            } else {
                return false;
            }
        }
    }

    static function createToastSession($type, $message)
    {
        $_SESSION["toast_type"] = $type;
        $_SESSION["toast_message"] = $message;
    }

    static function showToast($type, $message)
    {
        echo "<script type='text/javascript'>toastr.options.positionClass = 'toast-bottom-right';</script>";
        echo "<script type='text/javascript'>toastr." . $type . "('" . $message . "')</script>";
    }

    static function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        exit(0);
    }
}
