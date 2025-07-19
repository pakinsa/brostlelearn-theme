( function( $ ) {
    wp.customize.bind( 'ready', function() {
        // Live preview for colors
        wp.customize( 'primary_color', function( value ) {
            value.bind( function( to ) {
                document.documentElement.style.setProperty( '--primary', to );
            } );
        } );
        wp.customize( 'secondary_color', function( value ) {
            value.bind( function( to ) {
                document.documentElement.style.setProperty( '--secondary', to );
            } );
        } );
    } );
} )( jQuery );