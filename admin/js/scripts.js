$(document).ready(function(){


  ClassicEditor
        .create( document.querySelector( '#bodyyy' ) )
        .catch( error => {
            console.error( error );
        } );


});
