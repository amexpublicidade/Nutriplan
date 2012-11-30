jQuery(function($){
    
    $('a.delete-image').click(function(){
        var form=$(this).parents('form');
        var name=$(this).parents('fieldset').find('input[type=file]').attr('name');
        form.append('<input type="hidden" name="'+name+'" value="" />');
        $(this).parents('fieldset').detach();
        return false;
    });
    
});