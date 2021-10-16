<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custum css link -->
    <link rel="stylesheet" href="<?php echo $CONTENT_URL?>/css/basic.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL?>/css/variable.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL?>/css/sign-up.css">

    <title>Resto | Login</title>
</head>
<body>
    <div class="container">
        <h1> <a href="../home">Resto</a> Login</h1>
        <h4>Let' enjoy it</h4>
        <form action="?btn_process=login" method="post" id='form'>
            <label >username</label>
            <span class="showError"></span>
            <input type="text" placeholder="" name='username' id='username' required>
            <label >password</label>
            <span class="showError"></span>
            <input type="password" placeholder="" name='password' id='password' required>
            <input type="submit" class="submit-btn" value = 'Submit'>
        </form>
        
    </div>
    <p>Haven't have an account? <a href="../sign up/">sign up here</a></p>
    <p>Forgot password? <a href="?btn_forgot">reset here</a></p>

    <script src='../../content/js/validator.js'>
    </script>
    <script>
        
      Validator({
        form: '#form',
        messageElement: '.showError',
        rules: [
          Validator.isRequired('#username'),
          Validator.isRequired('#password',8)
        ]
      })

    
    </script>
</body>
</html>