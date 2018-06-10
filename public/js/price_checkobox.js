$("#price-checkbox").click( function(){   
    if( $(this).is(':checked') ){
        $("#price").attr("disabled",true);
        $("#price").val("");
    }else{
        $("#price").removeAttr("disabled");
    }
 });