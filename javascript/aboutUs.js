
// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Get the "Explore our Services" button element
    var exploreButton = document.querySelector('.explore');
  
    // Add a click event listener to the button
    exploreButton.addEventListener('click', function(event) {
      // Prevent the default behavior of the button (e.g., following the link)
      event.preventDefault();
  
      // Perform any desired actions when the button is clicked
      // For example, you can navigate to the services.html page
      window.location.href = 'services.html';
    });
  });