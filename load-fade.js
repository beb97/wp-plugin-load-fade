
// Before page load
// var previous_opacity = document.body.style.opacity/;
//<script>...</script>
document.body.style.transition = "opacity 0.5s";
document.body.style.opacity = 0.2;

// After page load
document.addEventListener("DOMContentLoaded", function(event) {
    document.body.style.transition = "opacity 0s";
    //document.body.style.opacity = 1;
});