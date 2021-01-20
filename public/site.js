let mailProfile = document.getElementById('mailProfile').innerHTML;
let warning = document.getElementById('warning');
console.log(mailProfile);

let domainMail = "gre";

let request = new XMLHttpRequest();
request.onreadystatechange = function() {
    if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
        let response = JSON.parse(this.responseText);
        console.log(response);
        if(response.valid == false) {
        	warning.innerHTML = "<p style='color:red;'>Attention, cet email n'est pas fiable !</p>"; 
        }
    }
};
request.open("GET", "https://mailcheck.p.rapidapi.com/?domain=" + domainMail);
request.setRequestHeader("x-rapidapi-key", "af5f99c370msh9bfb80b7fbbb8b4p13e172jsn847b1b58009c");
request.setRequestHeader("x-rapidapi-host", "mailcheck.p.rapidapi.com");
request.send();