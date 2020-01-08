$(document).ready(function () {
    $('#inputtag').hide();
    $('#addTopic').click(function () {
        $('#inputtag').show();
    });
    $('#tagName').keyup(function () {
        let query = $('#tagName').val();
        if (query !== '') {
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url: "http://127.0.0.1:8000/tags/autocomplete",
                method: "POST",
                data: {query: query, _token: _token},
                success: function (data) {
                    $('#tagList').fadeIn();
                    $('#tagList').html(data);
                },
            })
        }

    });
    $(document).on('click', 'li', function () {
        $('#tagName').val($(this).text());
        $('#tagList').fadeOut();
    })

});
