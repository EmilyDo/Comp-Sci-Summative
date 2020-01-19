
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
</head>


    <main>
    <div class="p-5">
        <div class="text-center card">
            <h1 class="h4 text-gray-900 mb-4">Sign Up</h1>
            </div>
              <form style="align-items: center; " class="card user" action="../includes/signup.inc.php" method="post"> 
                    <div style="align-content: center;" class="form-group">
                      <input class="form-control form-control-user" style="width: 50%; min-width: 19rem; " type="text" name="username" placeholder="Username"> 
                    </div>
                    <div style="align-content: center;" class="form-group">
                      <input class="form-control form-control-user" style="width: 50%; min-width: 19rem; " type="text" name="email" placeholder="Email"> 
                    </div>
                    <div style="align-content: center;" class="form-group">
                      <input class="form-control form-control-user" style="width: 50%; min-width: 19rem; " type="password" name="password" placeholder="Password">  
                    </div>
                    <div style="align-content: center;" class="form-group">
                      <input class="form-control form-control-user" style="width: 50%; min-width: 19rem; "type="password" name="password2" placeholder="Repeat Password"> 
                    </div>

                    <button style="border:0; width: 30%; " type="submit" name="signup-submit" class="btn btn-primary btn-user btn-block">
                      Sign Up
                    </button>
                    <hr>
                </form>
            <hr>
             
                <div class="text-center">
                <a class="small" href="actual-login.php">Already have an account?</a> 
        </div>
    </div>

    </main> 
</html>