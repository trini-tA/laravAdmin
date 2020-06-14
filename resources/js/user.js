import alertify from 'alertifyjs';

$( document ).ready(function() {
    alertify.defaults.transition = "slide";
    alertify.defaults.theme.ok = "btn btn-primary";
    alertify.defaults.theme.cancel = "btn btn-danger";
    alertify.defaults.theme.input = "form-control";

    $('.btn-reset-user').on( 'click', function(e){
        e.preventDefault();
        const button =  this;

        alertify.confirm( "Confirm", "Send email to reset password ?", function( ){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          
            $.ajax({
                url: $(button).attr( 'data-href'),
                type: 'POST',
                data: {email:  $(button).attr( 'data-email') },
                dataType: 'JSON',
                success: function (data) {
                    alertify.success( 'Email send !' );
          
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
        .set('labels', { ok: 'Send', cancel: 'Cancel' });;
    })

    $('.btn-delete-user').on( 'click', function(e){
        e.preventDefault();
        const button =  this;

        alertify.confirm( "Confirm", "Do you want delete this user?", function( ){

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
                    alertify.success( 'User deleted !' );
                    const userTable = $('.common-datatable').DataTable();
                    userTable.row( $(button).parents('tr') )
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