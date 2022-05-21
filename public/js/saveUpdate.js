jQuery(document).ready(function($){
    // CREATE
    $('input[name="video"]').change(function (e) {
        let progressBar = $('.center-sticky');
        progressBar.removeClass('d-none');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('input[name="_token"]').val(),
            }
        },
        );
        e.preventDefault();
        let formData = new FormData();
         let file = $('input[name="video"]')[0].files;
        formData.append('video', file[0]);

         
        let type = "POST";
        let ajaxUrl = 'save-video';
        $.ajax({
            type: type,
            url: ajaxUrl,
            contentType: false,
            processData: false,   
            cache: false, 
            data: formData,
            dataType: 'json',
            success: function (response) {
                $('#uplaodForm').append('<input type="hidden" name="video_path" value="" />');
                $('input[name="video_path"]').val(response.video_path);
                progressBar.addClass('d-none');
            },
            error: function () {
                console.log('error');
            }
        });
    });
});