<?php



include("dbconnect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    
<link rel="icon" type="image/png" href="path-to-your-favicon"/>


    <meta charset="UTF-8">
    <title>Facebook.com</title>
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>


@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Roboto", sans-serif;
}

.res {
    display: flex;
    align-items: center;
}

.row {
    padding: 0 15px;
    min-height: 100vh;
    justify-content: center;
    background: #f0f2f5;
}

.fb-form {
    justify-content: space-between;
    max-width: 1000px;
    width: 100%;
}

.fb-form .card {
    margin-bottom: 90px;
}

.fb-form h1 {
    color: #1877f2;
    font-size: 4rem;
    margin-bottom: 10px;
}

.fb-form p {
    font-size: 1.75rem;
    white-space: nowrap;
}

form {
    display: flex;
    flex-direction: column;
    background: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 8px 16px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

form input {
    height: 55px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 6px;
    margin-bottom: 15px;
    font-size: 1rem;
    padding: 0 14px;
}

form input:focus {
    outline: none;
    border-color: #1877f2;
}

::placeholder {
    color: #777;
    font-size: 1.063rem;
}

.fb-submit {
    display: flex;
    flex-direction: column;
    text-align: center;
    gap: 15px;
}

.fb-submit .login {
    border: none;
    outline: none;
    cursor: pointer;
    background: #1877f2;
    padding: 15px 0;
    border-radius: 6px;
    color: #fff;
    font-size: 1.25rem;
    font-weight: 600;
    transition: 0.2s ease;
}

.fb-submit .login:hover {
    background: #0d65d9;
}

form a {
    text-decoration: none;
}

.fb-submit .forgot {
    color: #1877f2;
    font-size: 0.875rem;
}

.fb-submit .forgot:hover {
    text-decoration: underline;
}

hr {
    border: none;
    height: 1px;
    background-color: #ccc;
    margin-bottom: 20px;
    margin-top: 20px;
}

.button {
    margin-top: 25px;
    text-align: center;
    margin-bottom: 20px;
}

.button a {
    padding: 15px 20px;
    background: #42b72a;
    border-radius: 6px;
    color: #fff;
    font-size: 1.063rem;
    font-weight: 600;
    transition: 0.2s ease;
}

.button a:hover {
    background: #3ba626;
}

.footer-langs {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
}

footer ol {
    display: flex;
    flex-wrap: wrap;
    list-style-type: none;
    padding: 8px 0;

    margin-left: 3vh;
}

footer ol:first-child {
    border-bottom: 1px solid #dddfe2;
}

footer ol:first-child li:last-child button {
    background-color: #f5f6f7;
    border: 1px solid #ccd0d5;
    outline: none;
    color: #4b4f56;
    padding: 0 8px;
    font-weight: 700;
    font-size: 12px;
}

footer ol li {
    padding-right: 20px;
    font-size: 12px;
    color: #8a8d91;
}

footer ol li a {
    text-decoration: none;
    color: #8a8d91;
}

footer ol li a:hover {
    text-decoration: underline;
}

footer small {
    font-size: 12px;
    color: #8a8d91;
    margin-left: 3vh;
}

@media (max-width: 900px) {
    .fb-form {
        flex-direction: column;
        text-align: center;
    }

    .fb-form .card {
        margin-bottom: 30px;
    }
}

@media (max-width: 460px) {
    .fb-form h1 {
        font-size: 3.5rem;
    }

    .fb-form p {
        font-size: 1.3rem;
    }

    form {
        padding: 15px;
    }
}

</style>

</head>

<body>
    <div class="row res">
        <div class="fb-form res">
            <div class="card">
                <h1>facebook</h1>
                <p>Connect with friends and the world </p>
                <p> around you on Facebook.</p>
            </div>
            <form class="form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <input type="email" name="email" placeholder="Email or phone number"
                    required>
                <input type="password" name="password" placeholder="Password" required>
                <div class="fb-submit">
                    <button type="submit" class="login">Login</button>
                    <a href="#" class="forgot">Forgot password?</a>
                </div>
                <hr>
                <div class="button">
                    <a href="#">Create new account</a>
                </div>
            </form>
        </div>
    </div>
   
</body>

</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);

$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($email)){

    echo "please enter email";

}
elseif(empty($password)){

    echo "please enter password";

}
else {
$hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO user (email, password)
        VALUES ('$email', '$hash')";

mysqli_query($conn, $sql);
echo"You are now registered! <br>";
}
}

mysqli_close($conn);
?>