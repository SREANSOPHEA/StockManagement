<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body class="m-0 p-0 w-100 vh-100 d-flex justify-content-center align-items-center row bg-dark">
    @if (session()->has('error'))
        <script>
            $(document).ready(function(){
                swal('Account not found!!','Incorrect username or password','warning');
            })
        </script>
    @endif
    <div class="col-md-5 rounded bg-light text-dark p-2">
        <h3 class="text-center"><i><u>Login</u></i></h3>
        <table class="w-100">
            <form action="/userlogin-submit" method="post">
                @csrf
                <tr>
                    <th>Name</th>
                    <td><input type="text" class="form-control border-2 border-dark" name="name"></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>
                        <div class="input-group">
                            <input type="password" name="password" id="input" class="form-control border-2 border-dark" style="border-right: none">
                            <button type="button" id="btn" style="border-left: none;background-color:white;"><i class='bx bxs-hide'></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center"><button class="btn btn-primary">Login</button></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center"><span>Don't have an account? <a href="/user-register">register</a></span></td>
                </tr>
            </form>
        </table>
    </div>
    <script>
        $(document).ready(function(){
            $('#btn').click(function(){
                var type = $('#input').attr('type');
                if(type=='password'){
                    $('#input').attr('type','text');
                    $('.bx').attr('class','bx bxs-show');
                }else{
                    $('#input').attr('type','password');
                    $('.bx').attr('class','bx bxs-hide');
                }
            })
        });
    </script>
</body>
</html>