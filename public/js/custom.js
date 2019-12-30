function getmodel(id){
       $.ajax({
            url: 'http://camphorservices.com/admin/getmodel/'+id,
            data: 'brand_id ='+id,
            success: function(data){
                $('#model_data').html(data);

        },

        });
}







//  $(document).ready(function() {
//     $('#carmodeltable').DataTable();
// } );

CKEDITOR.replace('ckeditor');



