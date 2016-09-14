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
    url: "getaddeduser",
    formatters: {
        "command": function(column, row)
        {
            return "<button id=\""+row.recordid+"\"class=\"btn-del\" type=\"button\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i>"+row.recordid+"</button>"+
                   "<button id=\""+row.recordid+"\"class=\"btn-edit\" type=\"button\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>"+row.recordid+"</button>"; 
        }
    }
}).on("loaded.rs.jquery.bootgrid", function()
    {
        grid.find(".btn-del").on("click", function()
            {
                
                $.ajax({
                        type:"POST",
                        url:"./deluser",
                        data:{
                                id : $(this).attr('id')
                        },
                        success: function() {
                                console.log("data sent");
                        }
                });
        });
        
        grid.find(".btn-edit").on("click", function()
            {
                
                $.ajax({
                        type:"POST",
                        url:"./editdetail",
                        data:{
                                id : $(".btn-edit").attr('id')
                        },
                        success: function() {
                                console.log("data sent");
                        }
                });
        });

});
});