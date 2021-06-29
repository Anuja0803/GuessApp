<html>
<head>
<title>Guessing Game for Anuja Nikam</title>
<?php require_once "bootstrap.php"; ?>
<style>
  label{
    font-size: 20px;
    font-weight: bold;
    padding-top: 30px;
    color: purple;
  }
  input{
    padding-top: 20px;
  }
</style>
</head>
<body>
<div class="container">
<h1>Welcome to my guessing game</h1>
<form method="post" class="form-horizontal">
  <div class="form-group">
    <label>Guess a number between 1 - 100</label>
    <input class="form-control" type="text" name="guess"/>
    <input class="btn btn-default, waves-effect waves-light btn" type="submit" name="submit" value="Guess">
    <a class="btn btn-default, waves-effect waves-light btn" href="index.php">Log Out</i></a>
  </div>
</form>
<p>
<?php
if (isset($_POST['submit'])) {
  if ( ! isset($_POST['guess']) ) {
    echo("Missing guess parameter");
  } else if ( strlen($_POST['guess']) < 1 ) {
    echo("Your guess is too short");
  } else if ( ! is_numeric($_POST['guess']) ) {
    echo("Your guess is not a number");
  } else if ( $_POST['guess'] < 75 ) {
    echo("Your guess is too low");
  } else if ( $_POST['guess'] > 75 ) {
    echo("Your guess is too high");
  } else {
    echo("Congratulations - You are right");
  }
}
?>
</p>
</div>
</body>
</html>
