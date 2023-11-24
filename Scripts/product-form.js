const VALIDATE_API_URL = 'App/API/validateInputData.php'

$(function () {
    let isGeneratedFormActive = false
    let optionSelectTemplate = {
        DVD:
            $('<div>', {'class': 'form-group'}).append([
                $('<label>', {'text': 'Size (MB)', 'for': 'size'}),
                $('<input>', {'type': 'number', 'name': 'size', 'id': 'size'}),
                $('<span>', {'text': '* Please provide size in MB *'})]),

        Book:
            $('<div>', {'class': 'form-group'}).append([
                $('<label>', {'text': 'Weight (KG)', 'for': 'weight'}),
                $('<input>', {'type': 'number', 'name': 'weight', 'id': 'weight'}),
                $('<span>', {'text': '* Please provide weight in KG *'})]),

        Furniture:
            $('<div>').append([
                $('<div>', {'class': 'form-group'}).append([
                    $('<label>', {'text': 'Height (CM)', 'for': 'height'}),
                    $('<input>', {'type': 'number', 'name': 'height', 'id': 'height'})]),
                $('<div>', {'class': 'form-group'}).append([
                    $('<label>', {'text': 'Width (CM)', 'for': 'width'}),
                    $('<input>', {'type': 'number', 'name': 'width', 'id': 'width'})]),
                $('<div>', {'class': 'form-group'}).append([
                    $('<label>', {'text': 'Length (CM)', 'for': 'length'}),
                    $('<input>', {'type': 'number', 'name': 'length', 'id': 'length'})]),
                $('<span>', {'text': '* Please provide dimensions in HxWxL format *'})
            ])
    }

    $('#productType').on('change', function (e) {
        let selectedOption = $(this).val()
        resetFields()
        let template = optionSelectTemplate[selectedOption]
        if (isGeneratedFormActive) {
            $('#product_form').children().last().remove()
        }
        $('#product_form').append(template)
        isGeneratedFormActive = true
    })

    $('#save-new-product').on('click', function (e) {
        e.preventDefault();
        resetFields()
        let formData = $('#product_form');
        $.post(VALIDATE_API_URL,
            formData.serialize(), function (response) {
                if (!response.status) {
                    $.each(response.errors, function (key, value) {
                        $('#' + key).addClass('validateFail')
                            .val('')
                            .closest('.form-group').append($('<small>', {
                            'text': `${value}`,
                            'class': 'error-notification'
                        }))
                    })
                    return false
                }
                formData.submit()
            }, 'json');
    })

    function resetFields() {
        $('.validateFail').removeClass('validateFail');
        $('.error-notification').remove();
    }
});