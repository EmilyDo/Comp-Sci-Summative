    
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Student</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/personal.css" rel="stylesheet">
  <link href="../css/personal2.css" rel="stylesheet">
</head>

    <main>
    <div style="max-width: 50rem; margin-left: 15%; " class="p-5">
        <div class="text-center card">
            <h1 style="margin-top: 3%; " class="h4 text-gray-900 mb-4">Sign in to let your tutor know you'll be here today.</h1>
            </div>
              <form style="align-items: center; " class="card user" action="../includes/students-attendance.inc.php" method="post"> 
                    <div style="align-content: center; width: 50%; margin-top: 10%; " class="form-group">
                      <input style="max-width:25rem; width: 100%; " class="form-control form-control-user" style="width: 50%; min-width: 19rem; " type="text" name="email" placeholder="Email"> 
                    </div>
                  
                    <button style="border:0; width: 25%; " type="submit" name="signup-submit" class="btn btn-primary btn-user btn-block">
                      Sign In
                    </button>
                    <hr>
                </form>
             
    </div>

    </main> 
</html>