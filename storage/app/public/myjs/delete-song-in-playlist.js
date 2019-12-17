$(document).ready(function () {
    $('.deleteSongInPlaylist').click(function (event) {
        event.preventDefault();
        $('#messageDelete').html('');
        $.ajax(this.href, {
            success: function (data) {
                setTimeout(function () {
                    location.reload();
                }, 2000);
                $('#messageDelete').html('<span id="alert" class="alert alert-success mt-3" role="alert">Đã xóa bài hát khỏi playlist thành công</span>');
                window.setTimeout(function () {
                    $('#alert').fadeTo(500, 0).slideUp(500, function () {
                        $(this).remove();
                    })
                }, 2000);
            },
            error: function (data) {
                console.log('error');
            }
        })
    })
});
