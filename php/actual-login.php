
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login </title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/personal.css" rel="stylesheet">
  <link href="../css/personal2.css" rel="stylesheet">
  <link href="../css/phone.css" rel="stylesheet">
</head>
    <main>

    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
            </div>
              <form style="text-align: center; "class="user" action="../includes/signup.inc.php" method="post"> 
                    <div style="align-content: center;" class="form-group">
                      <input style="width: 50%; min-width: 19rem; " type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username">
                    </div>
                    <div style="align-content: center;" class="form-group">
                      <input style="width: 50%; min-width: 19rem; " type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button style="border:0; width: 30%; " type="submit" name="signup-submit"> <a href="index.html" class="btn btn-primary btn-user btn-block">
                      Login
                    </a> </button>
                    <hr>
                </form>
            <hr>
                <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
                <div class="text-center">
                <a class="small" href="login-scratch.php">Create an Account!</a> 
        </div>
    </div>


    </main> 
</html>