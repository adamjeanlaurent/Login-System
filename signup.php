<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Signup Page</title>
    <link rel="stylesheet" type="text/css" media="screen" href="styles/signup-styles.css" />
</head>
<body>
<!-- signup form -->
<div class= form-container>
<form action="includes/signup-script.php" method="post" class="list">
<input type="text" name="mail" placeholder="email"> <br>
<input type="text" name ="username" placeholder="username"> <br>
<input type="password" name="password" placeholder="password"> <br>
<input type="password" name="password_repeat" placeholder="repeat password"> <br>
<button class ="signupbtn" name="signup-submit">signup</button>
</div>
</form>
</body>
</html>