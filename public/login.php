<?php 

	include("login-action.php");




	// if($_SERVER['REQUEST_METHOD'] == "POST")
	// {
	// 	//something was posted
	// 	$user_name = $_POST['user_name'];
	// 	$password = $_POST['password'];

	// 	if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
	// 	{

	// 		//read from database
	// 		$query = "select * from credentials where user_name = '$user_name' limit 1";
	// 		$result = mysqli_query($con, $query);

	// 		if($result)
	// 		{
	// 			if($result && mysqli_num_rows($result) > 0)
	// 			{

	// 				$user_data = mysqli_fetch_assoc($result);
					
	// 				if($user_data['password'] === $password)
	// 				{

	// 					$_SESSION['user_id'] = $user_data['user_id'];
	// 					header("Location: index.php");
	// 					die;
	// 				}
	// 			}
	// 		}
			
	// 		echo "wrong username or password!";
	// 	}else
	// 	{
	// 		echo "wrong username or password!";
	// 	}
	// }

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Login Page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/my-login.css">

    </head>

    <body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center  h-100" >
                <div class="card-wrappr">
                    <div class="brand">

                        <img src="img/logo.png" alt="logo">
                    </div>
                    <div class="card fat">
                        <div class="card-body" >
                            <h4 class="card-title">Login</h4>
                            <form method="POST" action="login-action.php" id="frmLogin" class="my-login-validation" onSubmit="return validate();" novalidate="">
                                <div class="form-group">
      
                                    <label for="user_name">User ID</label>
                                    <input id="user_name" class="form-control" name="user_name" value=""  style="background-color: gray; border: black;" required autofocus>
                                    <div class="invalid-feedback">
                                        userid is invalid
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password
                                        <a href="https://telegram.me/doctor_ugs" class="float-right" style="color:gray">
                                            Forgot Password?
                                        </a>
                                    </label>
                                    <input id="password" type="password" class="form-control" style="background-color: gray; border: black;" name="password" required data-eye>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                        <label for="remember" class="custom-control-label">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" name="login" value="Login" class="btn btn-dark btn-block">
                                        Login
                                    </button>
                                    <div>
                                    <?php if(isset($_SESSION["errorMessage"])) {
                                        $errormsg = $_SESSION["errorMessage"];
                                        ?>
                                    <div type="text" class="text text-danger text-center" id="$errormsg">
                                        <?php echo $errormsg ?>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="mt-4 text-center" >
                                    <a href="https://telegram.me/doctor_ugs" style="color:gray">Don't have an account?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        If symptoms persist please consult your <a href="https://telegram.me/doctor_ugs" style="color:white">doctor</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a href="https://www.foxrefs.com/15/?frid=023a03a5-9&frt=2" target="_blank"><center><img src="https://www.foxrefs.com/b/a9d997aeac177f544099ed2f542ab2c7/15/?frid=023a03a5-9&frt=2" alt=""></a>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/my-login.js"></script>
    </body>
    </html>
    <script>
    // function validate() {
    //     var $valid = true;
    //     document.getElementById("invalid_feedback").innerHTML = "";
        
    //     var userName = document.getElementById("user_name").value;
    //     var password = document.getElementById("password").value;
    //     if(userName == "") 
    //     {
    //         document.getElementById("invalid_feedback").innerHTML = "Fill all the required textbox";
    //     	$valid = false;
    //     }
    //     if(password == "") 
    //     {
    //     	document.getElementById("invalid_feedback").innerHTML = "Fill all the required textbox";
    //         $valid = false;
    //     }
    //     return $valid;
    // }
    </script>



<