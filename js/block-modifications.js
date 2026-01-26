wp.domReady( () => {
    // We wait 100 milliseconds to make sure the variations exist in the registry
    setTimeout( () => {
        wp.blocks.unregisterBlockVariation( 'core/paragraph', 'stretchy-paragraph' );
        wp.blocks.unregisterBlockVariation( 'core/heading', 'stretchy-heading' );
        console.log('Attempted to unregister stretchy variations'); 
    }, 100 );
});