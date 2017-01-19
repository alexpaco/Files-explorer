var newsletter = document.getElementById('newsletter');
var content = document.getElementById('content');
var required = document.getElementById('required');

setTimeout(function showNewsletter (){ 
    newsletter.style.visibility = 'visible'; 
    content.style.visibility = 'visible';
    }, 2500)

function validateForm(){
    var champ = document.getElementById("mail").value;
    
    if (champ == ''){
        required.style.visibility = 'visible';
        return false;
    }
    else {
        alert ('Merci !');
        newsletter.style.visibility = 'hidden'; 
        content.style.visibility = 'hidden';
        required.style.visibility = 'hidden';
        return true;
    }
}

document.getElementById("cross").onclick = function() {
    newsletter.style.visibility = 'hidden'; 
    required.style.visibility = 'hidden';
    content.style.visibility = 'hidden';
    
};



