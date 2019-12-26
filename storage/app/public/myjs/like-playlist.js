$(document).ready(function () {
    $('.like-playlist').click(function (event) {
        event.preventDefault();
        playlistId = event.target.parentNode.parentNode.parentNode.dataset['playlistid'];
        let isLike = event.target.previousElementSibling == null;
        $.ajax({
            method: 'POST',
            url: urlLikePlaylist,
            data: {isLike: isLike, playlistId: playlistId, _token: token}
        })
            .done(function () {
                event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this playlist' : 'Like' : event.target.innerText == 'Dislike' ? 'You dont like this playlist' : 'Dislike';
                if (isLike) {
                    event.target.nextElementSibling.innerText = 'Dislike';
                } else {
                    event.target.previousElementSibling.innerText = 'Like';
                }
            })
    });
});
