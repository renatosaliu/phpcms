$(document).ready(function(){


  ClassicEditor
        .create( document.querySelector( '#555' ) )
        .catch( error => {
            console.error( error );
        } );


});
