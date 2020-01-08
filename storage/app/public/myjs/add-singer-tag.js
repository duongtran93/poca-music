$(document).ready(function () {
    $('#inputSinger').hide();
    $('#addSinger').click(function () {
        $('#inputSinger').show();
    });
    $('#tagSinger').keyup(function () {
        let query = $('#tagSinger').val();
        if (query !== '') {
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url: "http://127.0.0.1:8000/singers/autocomplete",
                method: "POST",
                data: {query: query, _token: _token},
                success: function (data) {
                    $('#singerList').fadeIn();
                    $('#singerList').html(data);
                },
            })
        }

    });
    $(document).on('click', 'li', function () {
        $('#tagSinger').val($(this).text());
        $('#singerList').fadeOut();
    })
});
