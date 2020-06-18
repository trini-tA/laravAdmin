import alertify from 'alertifyjs';

$( document ).ready(function() {
    alertify.defaults.transition = "slide";
    alertify.defaults.theme.ok = "btn btn-primary";
    alertify.defaults.theme.cancel = "btn btn-danger";
    alertify.defaults.theme.input = "form-control";

    
    $('.btn-delete-laratrust').on( 'click', function(e){
        e.preventDefault();
        const button =  this;

        alertify.confirm( "Confirm", "Do you want delete this " + $(button).attr( 'data-type') + "?", function( ){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          
            $.ajax({
                url: $(button).attr( 'data-href'),
                type: 'DELETE',
                //data: {email:  $(button).attr( 'data-email') },
                //dataType: 'JSON',
                success: function (data) {
                    alertify.success( $(button).attr( 'data-type' ) + ' deleted !' );
                    const _datatable = $('#' + $(button).attr( 'data-type') + '-list' ).DataTable();
                    _datatable.row( $(button).parents('tr') )
                        .remove()
                        .draw();
                    
                },
                error: function (e) {
                    alertify.error( e.responseJSON.message );
                }
            });
        },
        function(){
            //alertify.error('Cancel');
        })
        .set('reverseButtons', true)
        .set('labels', { ok: 'Delete', cancel: 'Cancel' });;
    })

    /*$('.btn-add-user').on( 'click', function(e){
        const userTable = $('.common-datatable').DataTable();
        userTable.row.add( '' ).draw();
    })*/
});