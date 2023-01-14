<?php

class ProductModel extends Connection
{
    public function getAll()
    {
        try {
            $query = "SELECT * FROM Products p 
            INNER JOIN Categories c 
            ON p.CategoryID = c.CategoryID";
            return $this->mysqli->query($query);
        } catch (Exception $e) {
            return null;
        }
    }

    public function pagination($page, $keyword)
    {
        // Find total records
        if (isset($keyword)) {
            $query = "SELECT COUNT(p.ProductID) as total FROM Products p 
            INNER JOIN Categories c 
            ON p.CategoryID = c.CategoryID
            WHERE p.ProductName LIKE '%$keyword%' OR c.CategoryName LIKE '%$keyword%'";
        } else {
            $query = "SELECT COUNT(ProductID) as total from Products";
        }

        $result = $this->mysqli->query($query);
        $row = mysqli_fetch_assoc($result);
        $total_records = ($row['total'] > 0) ? $row['total'] : 1;

        // Find limit and current page
        $current_page = isset($page) ? $page : 1;
        $limit = 10;

        // calculate total page and start
        $total_page = ceil($total_records / $limit);

        // Limit current page from 1 to total page
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }

        // Find start
        $start = ($current_page - 1) * $limit;

        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức

        if (isset($keyword)) {
            $query = "SELECT * FROM Products p 
            INNER JOIN Categories c 
            ON p.CategoryID = c.CategoryID
            WHERE p.ProductName LIKE '%$keyword%' OR c.CategoryName LIKE '%$keyword%'
            LIMIT $start, $limit";
            $result = $this->mysqli->query($query);
        } else {
            $query = "SELECT * FROM Products p 
                  INNER JOIN Categories c 
                  ON p.CategoryID = c.CategoryID
                  LIMIT $start, $limit";
            $result = $this->mysqli->query($query);
        }

        return [
            "current_page" => $current_page,
            "total_page" => $total_page,
            "products" => $result
        ];
    }

    public function getByKeyword($keyword)
    {
        try {
            $query = "SELECT * FROM Products p 
            INNER JOIN Categories c 
            ON p.CategoryID = c.CategoryID
            WHERE p.ProductName LIKE '%$keyword%' OR c.CategoryName LIKE '%$keyword%'";
            return $this->mysqli->query($query);
        } catch (Exception $e) {
            return null;
        }
    }


    public function getDetail($id)
    {
        try {
            $query = "SELECT * FROM Products p 
            INNER JOIN Categories c
            ON p.CategoryID = c.CategoryID 
            WHERE p.ProductID = '$id'";
            return $this->mysqli->query($query);
        } catch (Exception $e) {
            return null;
        }
    }

    public function create($object)
    {
        try {
            $categoryID = (int)$object["categoryID"];
            $productName = $object["productName"];
            $image = $object["image"];

            $query = "INSERT INTO Products(CategoryID, ProductName, Image) VALUES ('$categoryID', '$productName', '$image')";
            return $this->mysqli->query($query);
        } catch (Exception $e) {
            return false;
        }
    }

    public function update($object)
    {
        try {
            $productID = (int)$object["productID"];
            $categoryID = (int)$object["categoryID"];
            $productName = $object["productName"];
            $image = $object["image"];

            $query = "UPDATE Products SET CategoryID = '$categoryID', ProductName = '$productName', Image = '$image'
                      WHERE ProductID = '$productID'";
            return $this->mysqli->query($query);
        } catch (Exception $e) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $query = "DELETE FROM Products WHERE ProductID = '$id'";
            return $this->mysqli->query($query);
        } catch (Exception $e) {
            return false;
        }
    }
}
