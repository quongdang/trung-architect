<?php
session_start();//session starts here

?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="index.php?page=login">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                            </div>


                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >

                            <!-- Change this to a button or input when using this as a form -->
                          <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include_once "../configDb/database.php";

if(isset($_POST['login']))
{
    $user_email=$_POST['email'];
    $user_pass=$_POST['pass'];

    $check_user="select user_email from users WHERE user_email='$user_email'AND user_pass='$user_pass'";
    
    $database = new Database();
    $db = $database->getConnection();
    
	$stmt = $db->prepare( $check_user );
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row["user_email"])
    {
        echo "<script>window.open('index.php?page=projects','_self')</script>";

        $_SESSION['email']=$user_email;//here session is used and value of $user_email store in $_SESSION.

    }
    else
    {
        echo "<script>alert('Email or password is incorrect!')</script>";
    }
}
?>