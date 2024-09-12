var menu = document.getElementById('menu');
var slidebar = document.getElementById('slide');
var logout = document.getElementById('log_out');
var containerinfo = document.getElementById('container_confirm_exit');
var closemenu = document.querySelectorAll('#navigation-page')
var slidemove = document.getElementById('scroll')

if (closemenu.length > 0) {
    closemenu.forEach((menu, index) => {
        menu.addEventListener("click", function() {
            var translateXValue = -848 * index;
            slidemove.style.transform = `translateX(${translateXValue}px)`;
            slide();
        });
    });
}

menu.addEventListener('click', function() {
    // Check if the sidebar is in the "slide" position
    if (slidebar.getAttribute("class") === "slide position-fixed bg-light flex-column align-items-start pt-2 px-4 border border-dark border-end-0") {
        // Change to "slide-reverse" class
        slidebar.setAttribute("class", "slide-reverse position-fixed bg-light flex-column align-items-start pt-2 px-4 border border-dark border-end-0");

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
    } else {
        // Change back to "slide" class
        slidebar.setAttribute("class", "slide position-fixed bg-light flex-column align-items-start pt-2 px-4 border border-dark border-end-0");
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

function slide(){ 
    if (slidebar.getAttribute("class") === "slide position-fixed bg-light flex-column align-items-start pt-2 px-4 border border-dark border-end-0") {
    // Change to "slide-reverse" class
        slidebar.setAttribute("class", "slide-reverse position-fixed bg-light flex-column align-items-start pt-2 px-4 border border-dark border-end-0");

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
    }
}