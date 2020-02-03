"use strict";
// Class definition

var KTSummernoteDemo = function () {    
    // Private functions
    var demos = function () {
        $('.summernote').summernote({
            height: 200,
            placeholder: 'Введите текст'
        });
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

// Initialization
jQuery(document).ready(function() {
    KTSummernoteDemo.init();
});