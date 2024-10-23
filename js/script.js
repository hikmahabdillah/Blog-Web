document.addEventListener("DOMContentLoaded", function () {
  const profileImage = document.querySelector(".circle");
  const profileCard = document.querySelector(".profile-card");
  const profileMenu = document.querySelector("#menu-profile");

  //event untuk memunculkan card profile
  profileImage.addEventListener("click", function () {
    profileCard.classList.toggle("card-active");
  });

  // event ketika menu profile diklik, muncul overlay
  profileMenu.addEventListener("click", function () {
    document.getElementById("overlay-profile").style.display = "grid";
  });

  // event untuk close overlay
  document
    .getElementById("cancelButton")
    .addEventListener("click", function () {
      document.getElementById("overlay-profile").style.display = "none"; // Menyembunyikan overlay
    });

  document
    .getElementById("overlay-profile")
    .addEventListener("click", function (event) {
      if (event.target === this) {
        this.style.display = "none"; // Menyembunyikan overlay saat mengklik area overlay
      }
    });

    // event untuk memunculkan thumbnail ketika memilih file
    document.getElementById('blog-banner').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const imageUrl = URL.createObjectURL(file);
        console.log(imageUrl)
        document.getElementById('banner-image').src = imageUrl;
      }
    });

    //event thumbnail utk change profile
    document.getElementById('photo-upload').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const imageUrl = URL.createObjectURL(file);
        console.log(imageUrl)
        document.getElementById('photo-profile-thumbnail').src = imageUrl;
      }
    });
});
