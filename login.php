<?php

/*if ( isset($_POST['Cancel'] ) ) {
    header("Location: index.php");
    return;
}*/

$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Pw is php123

$failure = false;

if ( isset($_POST['email']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 ) {
        $failure = "User name and password are required";
    } else {
        $check = hash('md5', $salt.$_POST['pass']);
        if ( $check == $stored_hash ) {
            // Redirect the browser to game.php
            header("Location: guess.php?name=".urlencode($_POST['email']));
            return;
        } else {
            $failure = "Incorrect password";
        }
    }
}

// Fall through into the View
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php"; ?>
<title>Anuja Nikam Login Page</title>
</head>
<body>
<div class="container">
  <div class="card-panel teal lighten-2, center-align">
    <h1>Please Log In</h1>
  </div>

<?php
if ( $failure !== false )
{
    // Look closely at the use of single and double quotes
    echo(
        '<p style="color: red;" class="col-sm-10 col-sm-offset-2">'.
            htmlentities($failure).
        "</p>\n"
    );
}
?>
<form method="post" class="form-horizontal">
    <div class="form-group">
        <h4><label for="email" style="font-size:15px;color:black;padding-left: 30px;">User name:</label></h4>
        <div class="col-sm-3">
            <input class="form-control" type="text" name="email" id="email">
        </div>
    </div>
    <div class="form-group">
        <h4><label for="pass" style="font-size:15px;color:black;padding-left: 30px;">Password:</label></h4>
        <div class="col-sm-3">
            <input class="form-control" type="password" name="pass" id="pass">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 col-sm-offset-2">
            <input class="btn btn-primary" type="submit" value="Log In"><br><br>
            <a class="btn btn-default, waves-effect waves-light btn" href="index.php">Cancel</i></a>
        </div>
    </div>
</form>
</div>
</body>
