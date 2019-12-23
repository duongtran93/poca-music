// $(document).ready(function () {
//     $('#login').submit(function (event) {
//         // event.preventDefault();
//         let loginForm = $('#login');
//         let formData = loginForm.serialize();
//         $('#email-error').html('');
//         $('#password-error').html('');
//         $.ajax({
//             url: 'http://127.0.0.1:8000/login',
//             type: 'POST',
//             data: formData,
//             success: function (data) {
//                 console.log(data);
//                 // $(this).attr("data-dismiss","modal");
//                 // let err = JSON.parse(data.responseText);
//                 // console.log(err)
//             },
//             error: function (error) {
//                 $('#loginModal').attr('aria-hidden','false');
//                 // $( "#login" ).submit(function( event ) {
//                 //     event.preventDefault();
//                 // });
//                 // $('#loginModal').modal('show');
//                 let err = JSON.parse(error.responseText);
//                 $('#email-error').html(err.errors.email[0]);
//                 $('#password-error').html(err.errors.password[0]);
//                 console.log(err)
//
//             }
//         })
//     });
// });
