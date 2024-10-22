document.addEventListener("DOMContentLoaded", function() {
  const profileImage = document.querySelector('.circle');
  const profileCard = document.querySelector('.profile-card');

  profileImage.addEventListener('click', function() {
    profileCard.classList.toggle('card-active'); 
  });
});