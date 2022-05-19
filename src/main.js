function setFormMessage(formElement, type, message){
    const messageElement = formElement.querySelector(".form__message");
    messageElement.textContent = message;
    messageElement.classList.remove("form__message--success", "form__message--error");
    messageElement.classList.add(`form__message--${type}`);
}

function setInputError(inputElement, message) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = "";
}

//setFormMessage(loginForm, "success", "You're Logged in!");

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#createAccount");
    const resetPasswordForm = document.querySelector("#resetPassword");

    document.querySelector("#linkCreateAccount").addEventListener("click", (e) => {
        e.preventDefault();
        loginForm.classList.add("form--hidden");
        createAccountForm.classList.remove("form--hidden");
    });

    document.querySelector("#linkLogin").addEventListener("click", (e) => {
        e.preventDefault();
        loginForm.classList.remove("form--hidden");
        createAccountForm.classList.add("form--hidden");
    });

    document.querySelector("#linkSignIn").addEventListener("click", (e) => {
        e.preventDefault();
        loginForm.classList.remove("form--hidden");
        resetPasswordForm.classList.add("form--hidden");
    });

    document.querySelector("#linkRegisterAccount").addEventListener("click", (e) => {
        e.preventDefault();
        resetPasswordForm.classList.add("form--hidden");
        createAccountForm.classList.remove("form--hidden");
    });

    document.querySelector("#linkResetPassword").addEventListener("click", (e) => {
        e.preventDefault();
        loginForm.classList.add("form--hidden");
        resetPasswordForm.classList.remove("form--hidden");
    });

    loginForm.addEventListener("submit", (e) => {
        e.preventDefault();

        var inputtedUserName = $("#login #username").val();
        var inputtedPassword = $("#login #password").val();
        //$.post("https://cosas-de-tava.000webhostapp.com/phpmysql/registrationapi.php?apicall=login",
        $.post("phpmysql/registrationapi.php?apicall=login",
            { username: inputtedUserName,
                password: inputtedPassword
            },
            function(data, status) {
                //alert("Data: " + data + "\nStatus: " + status);
                const odata = JSON.parse(data);
                //console.log(odata);
                if (odata.error === false) {
                    //alert("Data: " + data + "\nStatus: " + status);
                    window.location.href="home.php";
                }
                else
                    setFormMessage(loginForm, "error", "Invalid username/password combination");
            });
    });

    createAccountForm.addEventListener("submit", (e) => {
        e.preventDefault();

        var inputtedUserName = $("#createAccount #signupUsername").val();
        var inputtedEmail = $("#createAccount #signupEmail").val();
        var inputtedPassword = $("#createAccount #signupPassword").val();
        var inputtedPassword2 = $("#createAccount #signupPassword2").val();

        if(inputtedPassword == inputtedPassword2) {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (inputtedEmail.match(mailformat))
                $.post("phpmysql/registrationapi.php?apicall=signup",
                    {
                        username: inputtedUserName,
                        password: inputtedPassword,
                        email: inputtedEmail,
                        gender: ''
                    },
                    function (data, status) {
                        //alert("Data: " + data + "\nStatus: " + status);
                        const odata = JSON.parse(data);
                        //console.log(odata);
                        if (odata.error === false) {
                            //alert("Data: " + data + "\nStatus: " + status);
                            window.location.href = "index.php";
                        } else
                            setFormMessage(createAccountForm, "error", odata.message);
                    });
            else
                setFormMessage(createAccountForm, "error", "Enter a valid email address");
        }
        else
            setFormMessage(createAccountForm, "error", "Passwords do not match");
    });

    document.querySelectorAll(".form__input").forEach(inputElement => {
        inputElement.addEventListener("blur", (e) => {
            if(e.target.id == "signupUsername" && e.target.value.length > 0 && e.target.value.length < 10) {
                setInputError(inputElement, "Username must be at least 10 characters in length");
            }
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (e.target.id == "signupEmail" && (e.target.value.length == 0 || !e.target.value.match(mailformat))) {
                setInputError(inputElement, "Enter a valid email address");
            }
            if (e.target.id == "signupPassword" && e.target.value.length > 0 && e.target.value.length < 8) {
                setInputError(inputElement, "Password must be at least 8 characters in length");
            }
            if (e.target.id == "signupPassword2" && e.target.value.length > 0 && e.target.value.length < 8) {
                setInputError(inputElement, "Password must be at least 8 characters in length");
            }
        });
        inputElement.addEventListener("input", (e) => {
            clearInputError(inputElement);
        });
    });
});
