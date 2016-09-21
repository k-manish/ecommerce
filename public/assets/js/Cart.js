function checkOrder()
{
    $.ajax({
        url: baseurl+'/checkanyorder?id='+$('#cart').attr('value'),
        type: 'GET',
        success : function(response){
            $('#cart').find('.badge').html(response);
            console.log(location.origin);
        },
        failure : function(){
        }
    });
}

function addToCart()
{   
    $.ajax({
        url: baseurl + '/addToCart?id=' + $('#addcart').attr("value"),
        type: 'get',
        success : function(response){
            console.log(response);
            window.location.replace(baseurl + "/productdetail");
        }
    });
}