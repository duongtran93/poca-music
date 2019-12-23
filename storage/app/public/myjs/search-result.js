$(document).ready(function () {
    $('.resultSearch').hide();
    $('#search').keyup(function () {
        $('.resultSearch').show();
        let value = $('#search').val();
        $.ajax({
            url: 'http://127.0.0.1:8000/songs/search',
            type: 'GET',
            dataType: 'json',
            data: {search: value},
            success: function (data) {
                let song = 'Bài hát';
                console.log(data);
                $.each(data, function (index, item) {
                    song += '<p>';
                    song += '<a href="http://127.0.0.1:8000/songs/listenMusic/'+item.id+'">';
                    song += item.name;
                    song += '</a>';
                    song += '</p>'
                });
                $('#result').html(song);
            },
            error: function (data) {
                $('#result').html('');
            }
        });
        $.ajax({

        })
    });
    // $(document).click(function () {
    //     $('.resultSearch').hide();
    // })
});
