$(document).ready(function () {
    $('.like').click(function (event) {
        event.preventDefault();
        songId = event.target.parentNode.parentNode.parentNode.parentNode.dataset['songid'];
        let isLike = event.target.previousElementSibling == null;
        $.ajax({
            method: 'POST',
            url: urlLike,
            data: {isLike: isLike, songId: songId, _token: token}
        })
            .done(function () {
                event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You dont like this post' : 'Dislike';
                if (isLike) {
                    event.target.nextElementSibling.innerText = 'Dislike';
                } else {
                    event.target.previousElementSibling.innerText = 'Like';
                }
            })
    });
});
