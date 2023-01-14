$(document).ready(function () {
    $('.copybtn').on('click', function () {

        $('#copyModal').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        $('#copyForm').attr('action', "/lesson2/products/copy/" + data[0]);
    });
});

$(document).ready(function () {
    $('.deletebtn').on('click', function () {

        $('#deleteModal').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        $('#deleteForm').attr('action', "/lesson2/products/delete/" + data[0]);
    });
});

$(document).ready(function () {
    document.querySelector('.custom-file-input').addEventListener('change', function (e) {
        var fileName = document.getElementById("image").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
})

function handle(e) {
    if (e.keyCode === 13) {
        e.preventDefault(); 
    }
}