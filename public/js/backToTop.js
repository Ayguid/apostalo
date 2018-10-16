// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("backToTopButton").style.display = "block";
    } else {
        document.getElementById("backToTopButton").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document

window.onload = function() {
  var backToTopButton = document.getElementById('backToTopButton');
  backToTopButton.addEventListener("click", function topFunction() {

    window.scrollTo({
    top: 0,
    behavior: "smooth"});
  });

};
