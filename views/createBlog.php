<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Your Blog</title>
  <link rel="stylesheet" href="./css/stylesFormBlog.css">
  <link rel="stylesheet" href="./css/styleNavbar.css">
  <link rel="stylesheet" href="./css/styleOverlay.css">
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css" />

</head>

<body>
  <?php include './views/navbar.php' ?>
  <div class="container">
    <div class="form-container">
      <h1>Create Your Blog</h1>
      <p class="subtitle">lorem ipsum dolor sit amet</p>

      <form>
        <!-- Blog Banner -->
        <div class="banner-section">
          <label for="blog-banner" class="blog-banner-label">Blog Banner</label>
          <div class="image-preview">
            <img src="./assets/img/banner.jpg" alt="Blog Banner" id="banner-image">
          </div>
          <input type="file" id="blog-banner" accept="image/*">
          <button type="button" class="choose-button" onclick="document.getElementById('blog-banner').click()">Choose a Picture</button>
        </div>

        <!-- Blog Title and Category -->
        <div class="input-row">
          <div class="input-group">
            <label for="title">Title</label>
            <input type="text" id="title" placeholder="Title">
          </div>
          <div class="input-group">
            <label for="category">Category</label>
            <input type="text" id="category" placeholder="Category">
          </div>
        </div>

        <!-- Blog Description -->
        <div class="input-group input-description">
          <label for="description">Description</label>
          <input type="text" id="description" placeholder="Type a short description">
        </div>

        <!-- Blog Content -->
        <div class="input-group input-content">
          <label for="content">Content</label>
          <textarea id="content" rows="10" placeholder="Type your content here"></textarea>
        </div>

        <!-- Action Buttons -->
        <div class="button-group">
          <a href='./'>
            <button type="button" class="cancel-button">Cancel</button>
          </a>
          <button type="submit" class="publish-button">Publish</button>
        </div>
      </form>
    </div>
  </div>
  <!-- profile user -->
  <?php include './views/profileUser.php' ?>
  <script src="./js/script.js"></script>
  <!-- CKEditor CDN -->
  <script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.2.0/"
        }
    }
</script>
  <script type="module">
    import {
      ClassicEditor,
      Essentials,
      Bold,
      Italic,
      Font,
      Paragraph,
      Heading,
      List
    } from 'ckeditor5';

    ClassicEditor
      .create(document.querySelector('#content'), {
        plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, List],
        toolbar: [
          'undo', 'redo', '|',
          'heading',
          '|', 'bold', 'italic', 'numberedList', 'bulletedList',
          '|',
          'fontSize', 'fontColor', 'fontBackgroundColor'
        ],
        height: '500px',
      })
      .then(editor => {
        console.log(editor);
      })
      .catch(error => {
        console.error(error);
      });
  </script>
</body>

</html>