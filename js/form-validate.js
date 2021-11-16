$(function () {
    var $addForm = $("#addForm");
    $addForm.validate({
        rules: {
            name: {
                required: true
            },
            district: {
                required: true
            },
            pub_date: {
                required: true
            },
            description: {
                required: true
            },
            status: {
                required: true
            }
        },
        messages: {
            name: {
                required: 'Street name is required.'
            },
            district: {
                required: 'Please chose a district.'
            },
            pub_date: {
                required: 'Public date is required.'
            },
            description: {
                required: 'Description is required.'
            },
            status: {
                required: 'Status is required.'
            }
        }
    });
})

