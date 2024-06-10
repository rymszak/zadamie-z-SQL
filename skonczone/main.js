const send=document.querySelector("#send")
send.addEventListener('click', function(evt){
    const form = document.querySelector("form[action='przesyl.php']");
    const surname = document.getElementById("surname");
    const firm = document.getElementById("firm");
    const problem = document.getElementById("problem");
    const priorityLow = document.getElementById("low");
    const priorityMid = document.getElementById("mid");
    const priorityHigh = document.getElementById("high");

    form.addEventListener("submit", function (event) {
        let valid = true;
        let messages = [];

        
        if (surname.value.trim() === "") {
            valid = false;
            messages.push("Nazwisko jest wymagane.");
        }

        
        if (firm.value.trim() === "") {
            valid = false;
            messages.push("Firma jest wymagana.");
        }

        
        if (problem.value === "") {
            valid = false;
            messages.push("Wybierz problem.");
        }

        
        if (!priorityLow.checked && !priorityMid.checked && !priorityHigh.checked) {
            valid = false;
            messages.push("Wybierz priorytet.");
        }

        if (!valid) {
            alert(messages.join("\n"));
             event.preventDefault()
        }
       send.preventDefault();
    });
});

const logowanie=document.querySelector("#login")
logowanie.addEventListener('click', function(ev){
    ev.preventDefault()
    const userLogin=document.querySelector("#userLogin")
    const userPassword=document.querySelector("#userPassword")
    let valid = true;
    let messages = [];
    if (userLogin.value.trim() === "") {
        valid = false;
        messages.push("Nazwisko jest wymagane.");
    }
    if (userPassword.value.trim() === "") {
        valid = false;
        messages.push("Nazwisko jest wymagane.");
    }
    if(!valid) {
        alert(messages.join("\n"))
    }
})