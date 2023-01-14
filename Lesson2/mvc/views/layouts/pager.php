<?php

$start = $data["current_page"] - 1;
$end = $data["current_page"] + 1;
$next = ($data["current_page"] + 2 < $data["total_page"]) ? $data["current_page"] + 2 : $data["total_page"];
$prev = $data["current_page"] - 2;

if ($start < 1) {
    $start = 1;
}

if ($end > $data["total_page"]) {
    $end = $data["current_page"];
}

// If current_page > 1 and total_page > 1 then Previous Button is enabled
if ($data["current_page"] > 1 && $data["total_page"] > 1)
    $disabled = null;
else $disabled = "disabled";

if (isset($_GET["keyword"])) {
    echo "<li class='page-item " . $disabled . "'><a class='page-link' href='/lesson2/products/?page=" . $prev . "&keyword=" . $_GET['keyword'] . "'>Previous</a></li>";
} else {
    echo "<li class='page-item " . $disabled . "'><a class='page-link' href='/lesson2/products?page=" . $prev . "'>Previous</a></li>";
}

// Iterator per page
for ($i = $start; $i <= $end; $i++) {
    if ($i == $data["current_page"]) {
        echo "<li class='page-item active'><a class='page-link' href='javascript:void(0)'>" . $i . "<span class='sr-only'>(current)</span></a></li>";
    } else {
        if (isset($_GET["keyword"])) {
            echo "<li class='page-item'><a class='page-link' href='/lesson2/products/?page=" . $i . "&keyword=" . $_GET['keyword'] . "'>" . $i . "</a></li>";
        } else {
            echo "<li class='page-item'><a class='page-link' href='/lesson2/products?page=" . $i . "'>" . $i . "</a></li>";
        }
    }
}

// If current page < total page and total page > 1 then Next button is enabled
if ($data["current_page"] < $data["total_page"] && $data["total_page"] > 1) {
    $disabled = null;
} else $disabled = "disabled";

if (isset($_GET["keyword"])) {
    echo "<li class='page-item " . $disabled . "'><a class='page-link' <a href='/lesson2/products/?page=" . $next . "&keyword=" . $_GET['keyword'] . "'>Next</a></li>";
} else {
    echo "<li class='page-item " . $disabled . "'><a class='page-link' href='/lesson2/products?page=" . $next . "'>Next</a></li>";
}
