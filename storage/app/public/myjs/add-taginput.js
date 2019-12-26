$(document).ready(function () {
    $('#inputtag').hide();
    $('#addTopic').click(function () {
        $('#inputtag').show();
    });
    $('#tagName').keyup(function () {
        console.log(1);

        let query = $('#tagName').val();
        $.ajax({
            url: "http://127.0.0.1:8000/song/searchTags",
            method: "POST",
            data: {query: query},
            success: function (data) {
                $('#tagList').fadeIn();
                $('#tagList').html(data);
            },
        })
    })

});
