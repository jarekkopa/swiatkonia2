$(document).ready(function() {

    $('select[name="category"]').on('change', function(){
        var categoryId = $(this).val();
        if(categoryId) {
            $.ajax({
                url: '/subcategories/get/'+categoryId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="subcategory"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="subcategory"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="sybcategory"]').empty();
        }

    });

});