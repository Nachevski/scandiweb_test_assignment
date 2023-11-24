const DELETE_API_URL = 'App/API/deleteProducts.php'

$(function () {
    $('#delete-product-btn').on('click', function (e) {
        e.preventDefault();
        let selectedCheckboxes = $('input:checked')
        let productsForDelete = [];
        if (selectedCheckboxes.length) {
            $.each(selectedCheckboxes, function (key, element) {
                productsForDelete.push($(element).data('id'))
            })
            $.post(DELETE_API_URL, {data: JSON.stringify(productsForDelete)}, function (response) {
                if (response.status == 'success') {
                    location.reload();
                }
            })
        } else {
            alert('Please select products first!')
        }
    })
});