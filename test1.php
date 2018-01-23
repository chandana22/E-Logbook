<!DOCTYPE html>
<html>
<?php session_start(); ?>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title> Admin </title>

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" type="text/css" href="../packaged/css/semantic.css">
  <link rel="stylesheet" type="text/css" href="homepage.css">

  <script src="jquery.js"></script>
  <script src="../packaged/javascript/semantic.js"></script>
  <script src="forms.js"></script>

</head>
<body id="home">

<form class="ui teal secondary form segment" name="input" action="approval.php" method="post">
  <p>Let's go ahead and get you signed up.</p>
  <div class="two fields">
    <div class="field">
      <label>First Name</label>
      <input placeholder="First Name" name="firstname" type="text">
    </div>
    <div class="field">
      <label>Last Name</label>
      <input placeholder="Last Name" name="lastname" type="text">
    </div>
  </div>
  <div class="field">
    <label>Username</label>
    <input placeholder="Username" name="username" type="text">
  </div>
  <div class="field">
    <label>Password</label>
    <input name="password" type="password">
  </div>
  <div class="field">
      <label>Gender</label>
      <div class="ui fluid selection dropdown">
        <input name="gender" type="hidden">
        <div class="default text">Gender</div>
        <i class="dropdown icon"></i>
        <div class="menu">
          <div class="item" data-value="1">Male</div>
          <div class="item" data-value="0">Female</div>
        </div>
      </div>
    </div>
  <div class="inline field">
    <div class="ui checkbox">
      <input name="terms" type="checkbox">
      <label>I agree to the terms and conditions</label>
    </div>
  </div>
  <div class="ui blue submit button">Submit</div>
</form>
</body>

</html>