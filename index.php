<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (isset($_SESSION['loggedin'])) {
    header('Location: home.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta charset="utf-8">
    <title>My Login/Sign Up Page</title>
    <link rel="stylesheet" href="src/styles.css">
    <script src="include/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <form class="form" id="login">
            <h1 class="form__title">Ingrese</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" id="username" class="form__input" autofocus placeholder="Username or email">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" id="password" class="form__input" autofocus placeholder="Password">
                <div class="form__input-error-message"></div>
            </div>
            <button class="form__button" type="submit">Continuar</button>
            <p class="form__text">
                <a href="./" class="form__link" id="linkResetPassword">Recuperar contraseña</a>
            </p>
            <p class="form__text">
                <a class="form__link" href="./" id="linkCreateAccount">¿No tiene una cuenta? Cree una aqui</a>
            </p>
        </form>
        <form class="form form--hidden" id="resetPassword">
            <h1 class="form__title">Reiniciar contraseña</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" id="email" class="form__input" autofocus placeholder="email">
                <div class="form__input-error-message"></div>
            </div>
            <button class="form__button" type="submit">Continuar</button>
            <p class="form__text">
                <a class="form__link" href="./" id="linkSignIn">¿Ya tiene una cuenta? Ingrese aqui</a>
            </p>
            <p class="form__text">
                <a class="form__link" href="./" id="linkRegisterAccount">¿No tiene una cuenta? Cree una aqui</a>
            </p>
        </form>
        <form class="form form--hidden" id="createAccount">
            <h1 class="form__title">Cree su cuenta</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" id="signupUsername" class="form__input" autofocus placeholder="Username">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="text" id="signupEmail" class="form__input" autofocus placeholder="Email Address">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" id="signupPassword" class="form__input" autofocus placeholder="Password">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" id="signupPassword2" class="form__input" autofocus placeholder="Confirm Password">
                <div class="form__input-error-message"></div>
            </div>
            <button class="form__button" type="submit">Continuar</button>
            <p class="form__text">
                <a class="form__link" href="./" id="linkLogin">¿Ya tiene una cuenta? Ingrese aqui</a>
            </p>
        </form>
    </div>
    <script src="./src/main.js"></script>
</body>
</html>
