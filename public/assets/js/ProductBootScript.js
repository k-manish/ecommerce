$(document).ready(function(){
   
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
 
var grid = $("#grid-data").bootgrid({
    ajax: true,
    post: function ()
    {
        /* To accumulate custom parameter with the request object */
        return {
            id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
        };
        
    },
    url: "adminProductDetail",
    formatters: {
        "command": function(column, row)
        {
                return "<button id=\""+row.recordid+"\"class=\"btn-del\" type=\"button\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></button>"+
                   "<button id=\""+row.recordid+"\"class=\"btn-edit\" data-toggle=\"modal\" data-target=\"#myModal\">"+
                   "<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></button>";
        }
    }
}).on("loaded.rs.jquery.bootgrid", function()
    {
        grid.find(".btn-del").on("click", function()
            {
                
                $.ajax({
                        type:"POST",
                        url:"./delproduct",
                        data:{
                                id : $(this).attr('id')
                        },
                        success: function() {
                               location.reload();
                        }
                });
        });
        
        grid.find(".btn-edit").on("click", function()
            {
               window.location = "./editproduct/"+$(this).attr('id');
        });
        
        grid.find('tbody tr').on('click', function(e){
                if ($(e.target).hasClass('btn-edit') || $(e.target).hasClass('btn-del')) {
                    e.preventDefault();    
                } else{
                        window.location = "./showproductdetail/"+$(this).find('.btn-edit').attr('id');
                }
        });
        
    });
});