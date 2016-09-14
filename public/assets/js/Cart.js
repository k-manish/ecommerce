function checkOrder()
{
    $.ajax({
        url: 'checkanyorder',
        type: 'GET',
        success : function(response){
            $('#cart').find('.badge').html(response);
        },
        failure : function(){

        }
    });
}