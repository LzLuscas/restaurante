let activeFontAccessibility,countAumentar,countDiminuir = false;

var btnAumentar = jQuery('#btnAumentar');
var btnDiminuir = jQuery('#btnDiminuir');

btnAumentar.on('click', function(){
    countAumentar = true;
    countDiminuir = false;

    jQuery(".content").find("*").each(function() {
        var thisTextElement = jQuery(this);
        var atualFontSize = parseFloat(thisTextElement.css('font-size'));

        if (!thisTextElement.data('original-font-size')) {

            thisTextElement.data('original-font-size', atualFontSize);
            activeFontAccessibility = true;

        } else {

            thisTextElement.css('font-size', '');                
            thisTextElement.removeData('original-font-size');
            activeFontAccessibility = false;
            return;
        }

        if(activeFontAccessibility && countAumentar){

            var newFontSize = atualFontSize + Math.round(atualFontSize * 0.25) / 2;
            thisTextElement.css('font-size', newFontSize + 'px');
            
        }
        
    });

});

btnDiminuir.on('click', function(){
    countAumentar = false;
    countDiminuir = true;

    jQuery(".content").find("*").each(function() {
        var thisTextElement = jQuery(this);
        var atualFontSize = parseFloat(thisTextElement.css('font-size'));

        if (!thisTextElement.data('original-font-size')) {

            thisTextElement.data('original-font-size', atualFontSize);
            activeFontAccessibility = true;

        } else {

            thisTextElement.css('font-size', '');                
            thisTextElement.removeData('original-font-size');
            activeFontAccessibility = false;
            return;
        }

        if(activeFontAccessibility && countDiminuir){

            var newFontSize = atualFontSize + Math.round(atualFontSize * 0.25) - 5;
            thisTextElement.css('font-size', newFontSize + 'px');
            
        }
        
    });

});