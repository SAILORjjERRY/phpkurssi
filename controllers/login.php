<?php
session_start();

//login function
function login($username, $password) {

        //valid usernames and passwords
        $users = [
            'vamk' => '$2y$10$fSbmRHx5oO6MpFnZIjt3TurVUW5ZB1JHkHReSx2JnsN.t6IVkSMqu', 
            'e2101321' => '$2y$10$B653nKSPrJ8xUEvtWshSVenjC1KtVyeAxvKv2PiNHj97wcim0pUTW', 
            'mika' => '$2y$10$seatlKLCjXqIS4SaQifWgO5In.Fk.SpTdBopVeaHlDVfh931oZZ5S'
        ];

            if (isset($users[$username])) {
                //the provided username is correct, now validate the password
                $expectedPasswordHash = $users[$username];

                if (password_verify($password, $expectedPasswordHash)) {
                    //the provided password is also correct

                    //remember the username of the user who just logged in
                    $_SESSION['authenticated_user'] = $username;

                    //redirect to /secret.php
                    //header('Location: secret.php');
                    header ('Location: /~e2101321/php/proman/');
                    exit;
                } else {
                    //login failed
                    return false;
                }
            }
    }

if (isset($_POST['username'], $_POST['password'])) {
    if(!login($_POST['username'], $_POST['password'])){
        echo "Login failed, please try again";
    }
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<style>
    body {
    background-color: rgb(0, 0, 0);
    text-align: center;
    font-family: "Lucida Console", Monospace, serif;
    font-size: 36px;
    color: rgb(41, 247, 229);

  }
  
  h1 {
    font-family: "Lucida Console", Monospace, serif;
    font-size: 36px;
    color: rgb(41, 247, 229);
    text-align: center;
    border: 3px solid rgb(41, 247, 229);
  }


  div {
    height: 25px;
    width: 50%;
    background-color: rgb(0, 0, 0);
    margin: auto;
  }

  
</style>
<form method="post">
    <div>
        <label for="username">
                Username:
        </label>
            <input type="text" name="username" id="username">
    </div>
<br>
    <div>
        <label for="password">
                Password:
        </label>
        <input type="password" name="password" id="password">
    </div>
<br>
    <div>

        <button type="submit"> Submit </button>
    </div>
</form>


</body>
</html>