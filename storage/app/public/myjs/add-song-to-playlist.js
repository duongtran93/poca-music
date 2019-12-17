$(document).ready(function () {
    $('.addSongToPlaylist').click(function (event) {
        event.preventDefault();
        $('#messageAdd').html('');
        $.ajax(this.href, {
            success: function (data) {
                $('#messageAdd').html('<span id="alert" class="alert alert-success mt-3" role="alert">Đã thêm bài hát vào playlist thành công</span>');
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
