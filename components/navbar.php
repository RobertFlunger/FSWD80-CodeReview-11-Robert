<header>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="home.php">Travel-O-Matic</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="true">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div id="navb" class="navbar-collapse collapse hide">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="restaurant.php">Restaurants</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="event.php">Events/Things to do</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gmaps.php">Location Map</a>
      </li>
      <form class="form-inline" id="searchbar">
        <input class="form-control" type="search" placeholder="Search for name or address" aria-label="search" id="search" name="search"/>
      </form>
    </ul>

    <ul class="nav navbar-nav ml-auto">
      <?php 
        if ( !isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
          echo '<li class="nav-item">
                  <a class="nav-link" href="register.php"><span class="fas fa-user"></span>Sign Up</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php"><span class="fas fa-sign-in-alt"></span>Login</a>
                </li>';
        } else if ( isset($_SESSION['user'])) {
          echo '<li class="nav-item">
                  <a class="nav-link" href="logout.php?logout"><span class="fas fa-sign-out-alt"></span>Logout</a>
                </li>';
        } else if ( isset($_SESSION['admin'])) {
          echo '<li class="nav-item">
                  <a class="nav-link" href="adminpanel.php"><span class="fas fa-user-cog"></span>Admin Panel</a>
                </li>';
          echo '<li class="nav-item">
                  <a class="nav-link" href="logout.php?logout"><span class="fas fa-sign-out-alt"></span>Logout</a>
                </li>';
        }
      ?>
    </ul>
  </div>
</nav>
</header>
<!-- <a href="logout.php?logout"><button type="button" class="btn btn-warning">Sign Out</button></a>
if ( !isset($_SESSION['user'])) {
  header("Location: index.php");
  exit;
} -->