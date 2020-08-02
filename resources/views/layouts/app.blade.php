<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Laravel AJAX</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
      <a class="navbar-brand" href="#">LaravelAjax</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav navbar-right">
          @if (Auth::guest())
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
              </li>
          @else
              <li class="nav-item">
                <a class="nav-link" href="/posts">Members</a>
             </li>
             <li class="nav-user">
                {{ Auth::user()->name }}
             </li>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
              </li>
          @endif
        </ul>
      </div>
      </div>
    </nav>

    @yield('content')

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/register.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/forgotPassword.js"></script>



    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // ADD
            $('#btn-save-add-post').click(function (e) {


                var name = $('#name').val();
                var email = $('#email').val();
                var nic = $('#nic').val();
                var contact = $('#contact').val();
                var address = $('#address').val();
                var password = $('#password').val();
                var password2 = $('#password2').val();




                if (name == "") {
                    $("[name=name]").css("border","2px solid #ff1505");

                    return false;

                } else {
                    $("[name=name]").css("border","2px solid");
                }


                var regx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if(regx.test(email)) {

                    if (email == "") {
                        $("[name=email]").css("border", "2px solid #ff1505");

                        return false;

                    } else {
                        $("[name=email]").css("border", "2px solid");
                    }
                } else {

                    $("[name=email]").css("border","2px solid #ff1505");
                    return false;

                }

                /*nic validation for 9 numeric*/

                var renum = /^\d{9}$/;

                if(renum.test(nic))  {

                    if (nic == "") {
                        $("[name=nic]").css("border","2px solid #ff1505");

                        return false;

                    } else {
                        $("[name=nic]").css("border","2px solid");
                    }

                } else {

                    $("[name=nic]").css("border","2px solid #ff1505");
                    return false;

                }


                /*contact number validation for 10 numeric*/

                var recon = /^\d{10}$/;

                if(recon.test(contact))  {

                    if (contact == "") {
                        $("[name=contact]").css("border","2px solid #ff1505");

                        return false;

                    } else {
                        $("[name=contact]").css("border","2px solid");
                    }

                } else {

                    $("[name=contact]").css("border","2px solid #ff1505");
                    return false;

                }






                if (address == "") {
                    $("[name=address]").css("border","2px solid #ff1505");

                    return false;

                } else {
                    $("[name=address]").css("border","2px solid");
                }



                /*for password confirm*/

               if(password === password2) {

                   if (password == "") {
                       $("[name=password]").css("border","2px solid #ff1505");

                       return false;

                   } else {
                       $("[name=password]").css("border","2px solid ");
                   }

               } else {
                   $("[name=password]").css("border","2px solid #ff1505");

                   return false;
               }




                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/posts",
                    data: { "name": name, "email": email, "nic": nic, "contact": contact,"address": address, "password": password },
                    dataType: 'json',
                    success: function (data) {
                        var post = '<tr id="post' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td>><td>' + data.email + '</td><td>' + data.nic + '</td><td>' + data.contact + '</td><td>' + data.address + '</td><td>'+ data.password +'</td>';
                        post += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                        post += '<button class="btn btn-danger delete-post" value="' + data.id + '">Delete</button></td></tr>';
                        $('#posts-list').append(post);
                        $('#postsAddModal').modal('hide');

                        window.location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data.responseJSON);
                    }
                });


            });

            // EDIT
            $('body').on('click', '#modal-edit', function () {
                var post_id = $(this).val();

                $.get('/posts/edit/' + post_id, function (data) {

                    $('#post_id').val(data.id);
                    var name = $('#name-edit').val(data.name);
                    var email = $('#email-edit').val(data.email);
                    var nic = $('#nic-edit').val(data.nic);
                    var contact = $('#contact-edit').val(data.contact);
                    var address = $('#address-edit').val(data.address);
                    var password = $('#password-edit').val(data.password);
                });
            });

            // UPDATE
            $('#btn-save-update-post').click(function (e) {

                var name = $('#name-edit').val();
                var email = $('#email-edit').val();
                var nic = $('#nic-edit').val();
                var contact = $('#contact-edit').val();
                var address = $('#address-edit').val();
                var password = $('#password-edit').val();




                if (name == "") {
                    $("[name=name]").css("border","2px solid #ff1505");

                    return false;

                } else {
                    $("[name=name]").css("border","2px solid");
                }




                if (email == "") {
                    $("[name=email]").css("border","2px solid #ff1505");

                    return false;

                } else {
                    $("[name=email]").css("border","2px solid");
                }



                if (nic == "") {
                    $("[name=nic]").css("border","2px solid #ff1505");

                    return false;

                } else {
                    $("[name=nic]").css("border","2px solid");
                }



                if (contact == "") {
                    $("[name=contact]").css("border","2px solid #ff1505");

                    return false;

                } else {
                    $("[name=contact]").css("border","2px solid");
                }




                if (address == "") {
                    $("[name=address]").css("border","2px solid #ff1505");

                    return false;

                } else {
                    $("[name=address]").css("border","2px solid ");
                }







                if (password == "") {
                    $("[name=password]").css("border","2px solid #ff1505");

                    return false;

                } else {
                    $("[name=password]").css("border","2px solid ");
                }




                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/posts/update/" + post_id,
                    data: {"name": name, "email": email, "nic": nic, "contact": contact, "address": address, "password": password},
                    dataType: 'json',
                    success: function (data) {

                        var post = '<tr id="post' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td>><td>' + data.email + '</td><td>' + data.nic + '</td><td>' + data.contact + '</td><td>' + data.address + '</td><td>' + data.password + '</td>';
                        post += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                        post += '<button class="btn btn-danger delete-post" value="' + data.id + '">Delete</button></td></tr>';
                        $("#post_id" + post_id).replaceWith(post);
                        $('#postsEditModal').modal('hide');

                        window.location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data.responseJSON);
                    }
                });
            });

            // DELETE
            $('.delete-post').click(function () {
                var post_id = $(this).val();

                $.ajax({
                    type: "DELETE",
                    url: 'posts/' + post_id,
                    success: function (data) {
                        $("#post" + post_id).remove();

                        window.location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data.responseJSON);
                    }
                });
            });



        });

    </script>


</body>
</html>

