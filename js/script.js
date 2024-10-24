document.addEventListener("DOMContentLoaded", function () {
  const profileImage = document.querySelector(".circle");
  const profileCard = document.querySelector(".profile-card");
  const profileMenu = document.querySelector("#menu-profile");
  const blogMenu = document.querySelector("#menu-blogUser");

  //event untuk memunculkan card profile
  profileImage.addEventListener("click", function () {
    profileCard.classList.toggle("card-active");
  });

  // event ketika menu profile diklik, muncul overlay
  profileMenu.addEventListener("click", function () {
    document.getElementById("overlay-profile").style.display = "grid";
  });

  blogMenu.addEventListener("click", function () {
    document.getElementById("overlay-blogUser").style.display = "grid";
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

  document
    .getElementById("overlay-blogUser")
    .addEventListener("click", function (event) {
      if (event.target === this) {
        this.style.display = "none"; // Menyembunyikan overlay saat mengklik area overlay
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

    // menampilkan confirmasi untuk logout
    document.getElementById('logout-menu').addEventListener('click', function() {
      confirmLogout();
    });

    function confirmLogout() {
      const result = confirm("Are you sure you want to log out?");
      if (result) {
          window.location.href = './logout.php'; 
      }
  }
    // menampilkan confirmasi untuk logout
    document.getElementById('delete-blog').addEventListener('click', function() {
      confirmDelete();
    });

    function confirmDelete() {
      const result = confirm("Are you sure you want to delete this blog?");
      if (result) {
          window.location.href = './deleteBlog.php'; 
      }
  }
});
