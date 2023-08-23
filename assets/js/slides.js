// home slide
window.addEventListener('DOMContentLoaded', function() {
  var slideshow = document.getElementById('myDiv');
  var bgImage = '../assets/images/GettyImages-591755236.jpg';
  var gradientOverlay = 'linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4))';

  slideshow.style.backgroundImage = gradientOverlay + ', url(' + bgImage + ')';

  var images = [
      '../assets/images/Milad_Kharchegani_at_the_2016_Summer_Olympics.jpg',
      '../assets/images/GettyImages-591755236.jpg',
      '../assets/images/GettyImages-591755236 (1).jpg',
      '../assets/images/52221968793_3490622dbb_b.jpg'
  ];
  var currentIndex = 0;

  function changeBackground() {
      slideshow.style.backgroundImage = gradientOverlay + ', url(' + images[currentIndex] + ')';
      currentIndex = (currentIndex + 1) % images.length;
  }

  changeBackground(); // Set initial background
  setInterval(changeBackground, 3000);
});