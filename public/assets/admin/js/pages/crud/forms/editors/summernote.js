"use strict";
// Class definition

var KTSummernoteDemo = function () {    
	// Private functions
	var demos = function () {
		$('.summernote').summernote({
			height: 300,
			placeholder: 'Введите текст',
			callbacks: {
		        onImageUpload: function(files, editor, welEditable) {
		            sendFile(files[0], editor, welEditable);
		        },
		        onMediaDelete : function(target) {
                    deleteFile(target[0].src);
            	}
		    }
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

function sendFile(file, editor, welEditable) {
        var data = new FormData();
        data.append("file", file);

        $.ajax({
            data: data,
            type: 'POST',
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
                return myXhr;
            },
            url: "/admin/fileupload",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                console.log('✔️ | Фотография успешно добавлена.');
            	$('.summernote').summernote('insertImage', url);
            }
        });
}

// update progress bar

function progressHandlingFunction(e){
    if(e.lengthComputable){
        $('progress').attr({value:e.loaded, max:e.total});
        // reset progress on complete
        if (e.loaded == e.total) {
            $('progress').attr('value','0.0');
        }
    }
}

function deleteFile(src) {
    $.ajax({
        data: {src : src},
        type: "POST",
        url: "/admin/fileupload/remove", // replace with your url
        headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
        cache: false,
        success: function(resp) {
            console.log('✔️ | Фотография успешно удалена.');
        }
    });
}