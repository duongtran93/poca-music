// $(document).ready(function () {
//     $('.resultSearch').hide();
//     $('#search').keyup(function () {
//         $('.resultSearch').show();
//         let value = $('#search').val();
//         $.ajax({
//             url: 'http://127.0.0.1:8000/playlists/search',
//             type: 'GET',
//             dataType: 'json',
//             data: {search: value},
//             success: function (data) {
//                 let playlist = 'Playlist';
//                 console.log(1);
//                 $.each(data, function (index, item) {
//                     playlist += '<p>';
//                     playlist += '<a href="http://127.0.0.1:8000/songs/listenMusic/'+item.id+'">';
//                     playlist += item.name;
//                     playlist += '</a>';
//                     playlist += '</p>'
//                 });
//                 $('#playlist').html(playlist);
//             },
//             error: function (data) {
//                 $('#playlist').html('');
//             }
//         });
//     });
//     // $(document).click(function () {
//     //     $('.resultSearch').hide();
//     // })
// });
