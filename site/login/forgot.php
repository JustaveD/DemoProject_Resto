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

    <title>Resto | Reset</title>
</head>
<body>
    <div class="container">
        <h1> <a href="../home">Resto</a> Reset</h1>
        <h4>Check mail for reset</h4>
        <form action="?btn_process=sendmail" method="post">
            <label >email</label>
            <input type="email" placeholder="" name='cus_email' required>
            <input type="submit" class="submit-btn" value = 'Send email'>
        </form>
        
    </div>
    <p>Haven't have an account? <a href="../sign up/">sign up here</a></p>
</body>
</html>