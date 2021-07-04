    $( 'input[name="status"]' ).change(function() {
        var checked = $(this).is(':checked');
        if (checked) {
            $(this).val(1);
        } else {
            $(this).val(0);
        }
    });