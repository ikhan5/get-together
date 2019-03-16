<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>
    <div id="page-wrapper">
        <nav id="dashboard">
            <div id="logo">
                <h3>Get Together</h3>
            </div>
            <ul class="list-unstyled tools">
                <h3 class="tools-section">Site Tools</h3>
                <li>
                    <a href="../events/index.php">
                        <i class="tool-icon far fa-calendar-alt"></i>
                        <span class="tool-label">Events</span>
                    </a>
                </li>
                <li>
                    <a href="../account/index.php">
                        <i class="far fa-user"></i>
                        <span class="tool-label">Users</span>
                    </a>
                </li>
                <li>
                    <a href="../todo/listtodo.php">
                        <i class="far fa-list-alt"></i>
                        <span class="tool-label">To-Do</span>
                    </a>
                </li>
                <li>
                    <a href="../rsvp_drinks/rsvp_index.php">
                        <i class="far fa-envelope"></i>
                        <span class="tool-label">Invitations</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-poll-h"></i>
                        <span class="tool-label">Polls</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="far fa-flag"></i>
                        <span class="tool-label">Notifications</span>
                    </a>
                </li>
                <h3 class="tools-section">Food & Drinks</h3>
                <li>
                    <a href="#">
                        <i class="fas fa-hamburger"></i>
                        <span class="tool-label">Food</span>
                    </a>
                </li>
                <li>
                    <a href="../rsvp_drinks/drinks_index.php">
                        <i class="fas fa-glass-cheers"></i>
                        <span class="tool-label">Drinks</span>
                    </a>
                </li>
                <h3 class="tools-section">Media</h3>
                <li>
                    <a href="../playlists/playlists.php">
                        <i class="fas fa-music"></i>
                        <span class="tool-label">Music</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="far fa-image"></i>
                        <span class="tool-label">Gallery</span>
                    </a>
                </li>
            </ul>
        </nav>
        <button id="toggle-sidebar" class="btn">
            <i class="fas fa-caret-right"></i>
        </button>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../scripts/dashboard.js"></script>
</body>

</html> 