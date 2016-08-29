$(document).ready(function(){

    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();

    $('.saveOrder').on('click', function(){

        var imageIds = [];

        $("#sortable span").each(function() {  
            imageIds.push($(this).attr('id'));
        });

        $.ajax({
            type: "POST",
            dataType: "text",
            url: "/products/orderImagesUpdate",
            data: {
                '_token'  : $('#token').val(),
                'imageIds'  : imageIds
            },
            success: function(html) {
                window.location.reload();
            }
        });

    });

});