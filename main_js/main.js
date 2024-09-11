var showpass = document.getElementById('check');
var pass = document.getElementById('password');

showpass.addEventListener('click',function(){
    if (showpass.checked) {
        pass.setAttribute('type', 'text');
    } else {
        pass.setAttribute('type', 'password');
    }
})
