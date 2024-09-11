var menu = document.getElementById('menu');
var slidebar = document.getElementById('slide');

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
            fill: 'forwards' // Maintain the end state after animation
        });
        
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
            fill: 'forwards'
        });

        console.log(slidebar.getAttribute("class"));
    }
});
