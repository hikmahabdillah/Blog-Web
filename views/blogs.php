<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MindPost | Blog Web App</title>
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="./css/styleOverlay.css">
  <link rel="stylesheet" href="./css/styleNavbar.css">
  <link rel="stylesheet" href="./css/stylesHome.css">
</head>

<body>
  <!-- navbar -->
  <?php include './views/navbar.php' ?>
  <!-- card profile user -->
  <?php include './views/profileUser.php' ?>
  <!-- display all blogs -->
  <?php include './views/allBlogs.php' ?>
  <!-- card blog user -->
  <?php include './views/userBlogModal.php' ?>
  
  <script src="./js/script.js"></script>
</body>

</html>