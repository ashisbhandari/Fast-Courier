<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Responsive Navbar</title>
    <style>
        .navbar .date {
            padding-left: 50px;
            margin-top: 10px;
        }

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            .navbar .date {
                padding-left: 0;
                margin-top: 5px;
                text-align: center;
            }
            .navbar-brand {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Fast Courier</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Greeting message -->
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="scrollToSection('abt')">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="scrollToSection('service')">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="scrollToSection('contact')">Contact</a>
      </li>
    </ul>
  </div>

  <!-- Login and Signup buttons -->
  <a class="nav-link btn  text-white ml-2" href="login.php">Login</a>
  <a class="nav-link btn  text-white ml-2" href="contact.php">Signup</a>
</nav>

<script>
  function scrollToSection(sectionId) {
    var section = document.getElementById(sectionId);
    if (section) {
      section.scrollIntoView({ behavior: 'smooth' });
    }
  }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
