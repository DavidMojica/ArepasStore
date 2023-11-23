const login_form = document.getElementById('loginForm');
const i_username = document.getElementById('user');
const i_password = document.getElementById('pass');
const msg  = document.getElementById('msg');

login_form.addEventListener('submit', function(e){
    e.preventDefault();

    const user_text = i_username.value.trim();
    const pass_text = i_password.value.trim();
    let error = "";
    let ban = true;

    if (user_text === "" || pass_text === "") {
        error += "Algún dato está vacío";
        ban = false;
    }

    if (ban) {
        mandar_al_servidor(user_text, pass_text, 1, msg);
    }
    else {
        msg.textContent = error;
        setTimeout(function() {
            clearSubtx(msg);
        }, 3000);
    }
});