<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title></title>
  <!-- Bootstrap links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="./Content/css/event.css">
  <link rel="stylesheet" href="./Content/css/carpoolchat.css">
  <link rel="stylesheet" href="./Content/style.css">
  <link rel="icon" href="./Content/Images/favicon.png">

</head>

<body>
  <header>
    <a id="top"></a>
    <div id="header-container">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="/">
          <img alt="Logo for Get Together" src="Content/Images/blackgglogo.png" class="header-logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
          aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link navbar-custom" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link navbar-custom" href="#about-us-section-container">Who we are</a>
            </li>
            <li class="nav-item">
              <a class="nav-link navbar-custom" href="#whatwedo-section-container">What we do</a>
            </li>
            <li class="nav-item">
              <a class="nav-link navbar-custom" href="#">How does it work</a>
            </li>
            <li class="nav-item">
              <a class="nav-link navbar-custom" href="#contact-us">Contact us</a>
            </li>
            <li class="nav-item">
              <?php if(isset($_SESSION['userid'])): ?>
                <div class="dropdown">
                  <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $_SESSION['username'] ?>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Dashboard</a>
                    <a class="dropdown-item" href="/account?action=logout_user">Logout</a>
                  </div>
                </div>
              <?php else: ?>
                <a class="nav-link navbar-custom" href="/account?action=show_add_form"><strong>Login/Register</strong></a>
              <?php endif; ?>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>