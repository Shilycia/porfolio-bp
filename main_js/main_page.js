var menu = document.getElementById('menu');
var slidebar = document.getElementById('slide');
var logout = document.getElementById('log_out');
var containerinfo = document.getElementById('container_confirm_exit');

menu.addEventListener('click', function() {
    // Check if the sidebar is in the "slide" position
    if (slidebar.getAttribute("class") === "slide position-fixed bg-danger flex-column align-items-start pt-2 px-4") {
        // Change to "slide-reverse" class
        slidebar.setAttribute("class", "slide-reverse position-fixed bg-danger flex-column align-items-start pt-2 px-4");

        // Slide-out animation (translate to the right)
        slidebar.animate([
            { transform: 'translateX(0)' },
            { transform: 'translateX(400px)' }
        ], {
            duration: 500,
            easing: 'ease-in-out',
            fill: 'forwards' // Maintain the end state after animation
        });

        // Rotate the menu icon back to the bars
        menu.animate([
            {transform: 'rotate(90deg)'},
            {transform: 'rotate(0deg)'}
        ],{
            duration: 500,
            easing: 'ease-in-out',
            fill: 'forwards'
        });
        menu.setAttribute("class", "fa-solid fa-bars text-light");
        console.log(slidebar.getAttribute("class"));
    } else {
        // Change back to "slide" class
        slidebar.setAttribute("class", "slide position-fixed bg-danger flex-column align-items-start pt-2 px-4");
        slidebar.style.display = "flex"; // Ensure it's visible
        
        // Slide-in animation (translate to the left)
        slidebar.animate([
            { transform: 'translateX(400px)' },
            { transform: 'translateX(0)' }
        ], {
            duration: 500,
            easing: 'ease-in-out',
            fill: 'forwards'
        });
        
        // Rotate the menu icon to an "X"
        menu.animate([
            {transform: 'rotate(0deg)'},
            {transform: 'rotate(90deg)'}
        ],{
            duration: 500,
            easing: 'ease-in-out',
            fill: 'forwards'
        });
        menu.setAttribute("class", "fa-solid fa-x text-light");
        console.log(slidebar.getAttribute("class"));
    }
});

logout.addEventListener('click', function(){

    containerinfo.style.display = "flex"
    
})

function noexit(){
    containerinfo.style.display = "none"
}

function exit(){
    window.location.href = "log_out.php"
}