$(document).ready(function)({
  $('.button-collapse').sideNav({
      menuWidth: 240, // Default is 240
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    });
  $('.collapsible').collapsible();
  
   // Show sideNav
  $('.button-collapse').sideNav('show');
  // Hide sideNav
  $('.button-collapse').sideNav('hide');
        
});