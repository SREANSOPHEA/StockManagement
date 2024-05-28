<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body class="m-0 p-0 w-100 vh-100 d-flex justify-content-center align-items-center row bg-dark">
    @if (session()->has('error'))
        <script>
            $(document).ready(function(){
                swal('This user already exist!','Please try another name','warning');
            })
        </script>
    @endif
    <div class="col-md-5 rounded bg-light text-dark p-2">
        <h3 class="text-center"><i><u>Register</u></i></h3>
        <table class="w-100">
            <form action="/register-submit" method="post">
                @csrf
                <tr>
                    <th>Name</th>
                    <td><input type="text" class="form-control border-2 border-dark" name="name" required></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>
                        <select name="gender" class="form-select border-2 border-dark">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="text" name="email" class="form-control border-2 border-dark" required></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="password" class="form-control border-2 border-dark" required></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center"><button class="btn btn-primary">Sign up</button></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center"><span>Already have an account? <a href="/login">login</a></span></td>
                </tr>
            </form>
        </table>
    </div>
</body>
</html>