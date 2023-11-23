const register_form = document.getElementById('regForm');
const r_username = document.getElementById('user');
const r_password1 = document.getElementById('pass1');
const r_password2 = document.getElementById('pass2');
const msg  = document.getElementById('msg');

register_form.addEventListener('submit', function(e){
        e.preventDefault();
    
        const user_text = r_username.value.trim();
        const pass_text = r_password1.value.trim();
        const pass2_text = r_password2.value.trim();
        let error = "";
        let ban = true;
    
        if (user_text === "" || pass_text === "" || pass2_text === "") {
            error += "Algún dato está vacío";
            ban = false;
        }
    
        if(pass_text !== pass2_text){
            error += "Las contraseñas no coinciden";
            ban = false;
        }
        if (ban) {
            mandar_al_servidor(user_text, pass_text, 2, msg);
        }
        else {
            msg.textContent = error;
            setTimeout(function() {
                clearSubtx(msg);
            }, 3000);
        }
    });