let browseFile = $('#browseFile');
let resumable = new Resumable({
    target: 'save-video',
    query: {
        _token: $('input[name="_token"]').val()
    }, // CSRF token
    fileType: ['mp4'],
    chunkSize: 10 * 1024 *
        1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
    headers: {
        'Accept': 'application/json'
    },
    testChunks: false,
    throttleProgressCallbacks: 1,
});

resumable.assignBrowse(browseFile[0]);

resumable.on('fileAdded', function(file) { // trigger when file picked
    showProgress();
    resumable.upload() // to actually start uploading.
});

resumable.on('fileProgress', function(file) { // trigger when file progress update
    updateProgress(Math.floor(file.progress() * 100));
});

resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete
    response = JSON.parse(response)
    $('#videoPreview').attr('src', response.path);
    $('.card-footer').show();
    $('#uplaodForm').append('<input type="hidden" name="video_path" value="" />');
     $('input[name="video_path"]').val(response.path);
});

resumable.on('fileError', function(file, response) { // trigger when there is any error
    alert('file uploading error.')
});


let progress = $('.progress');

function showProgress() {
    progress.find('.progress-bar').css('width', '0%');
    progress.find('.progress-bar').html('0%');
    progress.find('.progress-bar').removeClass('bg-success');
    progress.show();
}

function updateProgress(value) {
    progress.find('.progress-bar').css('width', `${value}%`)
    progress.find('.progress-bar').html(`${value}%`)
}

function hideProgress() {
    progress.hide();
}