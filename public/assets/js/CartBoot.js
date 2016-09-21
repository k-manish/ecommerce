$(document).ready(function(){
   
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
 
var grid=$("#grid-data").bootgrid({
    ajax: true,
    selection:true,
    multiSelect:true,
    post: function ()
    {
        /* To accumulate custom parameter with the request object */
        return {
            id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
        };
        
    },
    url: "getCartProduct",
    formatters: {
        "command": function(column, row)
        {
            return "<button id=\""+row.recordid+"\"class=\"btn-del\" type=\"button\"><i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i></button>"+
                   "<button id=\""+row.recordid+"\"class=\"btn-edit\" data-toggle=\"modal\" data-target=\"#myModal\">"+
                   "<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></button>"; 
        }
    }
});
});