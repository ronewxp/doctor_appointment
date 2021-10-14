ClassicEditor
    .create( document.querySelector( '#medicine' ) )
    .then( editor => {
        editor.ui.view.editable.element.style.height = '250px';
    } )
    .catch( error => {console.error( error ); } );

ClassicEditor
    .create( document.querySelector( '#examination' ) )
    .then( editor => {
        editor.ui.view.editable.element.style.height = '100px';
    } )
    .catch( error => {console.error( error ); } );

ClassicEditor
    .create( document.querySelector( '#lab_tests' ) )
    .then( editor => {
        editor.ui.view.editable.element.style.height = '100px';
    } )
    .catch( error => {console.error( error ); } );

ClassicEditor
    .create( document.querySelector( '#advice' ) )
    .then( editor => {
        editor.ui.view.editable.element.style.height = '100px';
    } )
    .catch( error => {console.error( error ); } );
