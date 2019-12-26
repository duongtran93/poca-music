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
                let song = '';
                song += '<p class="bg-secondary text-white">Bài hát</p>';
                let playlist = '';
                playlist += '<p class="bg-secondary text-white">Playlist</p>';
                let singer = '';
                singer += '<p class="bg-secondary text-white">Ca sĩ</p>';
                $.each(data[0], function (index, item) {
                        song += '<p>';
                        song += '<a href="http://127.0.0.1:8000/songs/listenMusic/'+item.id+'">';
                        song += item.name;
                        song += '</a>';
                        song += '</p>'

                });
                $.each(data[1], function (index, item) {
                    playlist += '<p>';
                    playlist += '<a href="http://127.0.0.1:8000/playlists/informationOC/'+item.id+'">';
                    playlist += item.name;
                    playlist += '</a>';
                    playlist += '</p>'

                });
                $.each(data[2], function (index, item) {
                    singer += '<p>';
                    singer += '<a href="http://127.0.0.1:8000/singers/informationOC/'+item.id+'">';
                    singer += item.name;
                    singer += '</a>';
                    singer += '</p>'

                });
                $('#result').html(song);
                $('#playlist').html(playlist);
                $('#singer').html(singer);
            },
            error: function (data) {
                $('#result').html('');
            }
        });
    });
    // $(document).click(function () {
    //     $('.resultSearch').hide();
    // })
});

