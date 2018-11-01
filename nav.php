<header>
  <nav>
    <div class="row">
      <img src="" alt="" class="logo">
      <ul class="main-nav">
        <li><a>Gallery</a></li>
        <?php
        if ($_SESSION['loggued_on_user']) {
          echo "<li><a>Profile</a></li>";
          echo "<li><a>Shoot</a></li>";
        } else {
          echo "<li><a id=\"modalBtn2\">Register</a></li>";
          echo "<li><a id=\"modalBtn\">Sign Up</a></li>";
        }?>
      </ul>
    </div>
    <div id="simpleModal" class="modal">
      <div class="modal-content">
        <div class="header-content-modal">
          <a>Enter your username/password</a>
          <span class="closeBtn">&times;</span>
        </div>
        <div class="body-content-modal">
          <input id="loglogin" type="text" name="loglogin" value="" placeholder="login" required></br>
          <input id="logpassword" type="password" name="logpassword" value="" placeholder="password" required>
        </div>
      </div>
    </div>
    <div id="simpleModal2" class="modal2">
      <div class="modal-content2">
        <div class="header-content-modal2">
          <a>Enter your stuffs</a>
          <span class="closeBtn2">&times;</span>
        </div>
        <div class="body-content-modal2">
          <input id="reglogin" type="text" name="reglogin" value="" placeholder="login" required></br>
          <input id="regpassword" type="password" name="regpassword" value="" placeholder="password" minlength="6" required></br>
          <input id="regemail"type="email" name="regemail" value="" placeholder="email@email.com" required></br>
          <input id="regfirstname" type="text" name="" value="" required placeholder="first name"></br>
          <input id="reglastname" type="text" name="" value="" placeholder="last name"required></br>
          <input id="regsubmit" type="submit" name="OK" value="Go">
        </div>
      </div>
    </div>
    <div id="simpleModal3" class="modal3">
      <div class="modal-content3">
        <span class="closeBtn3">&times;</span>
        <a>You need to be loggued to shoot Pictures!!</a>
      </div>
    </div>
  </nav>
  <div class="hero-text-box">
    <h1>Hello Jedis from Photography!</h1>
    <?php
    if ($_SESSION['loggued_on_user']) {
      echo "<a id=\"shoot\" class=\"btn btn-full\" href=\"#\">I WANT TO SHOOOOOT</a>";
      echo "<a class=\"btn btn-ghost\" href='#'>Show me some PIIIIIICS</a>";
      echo "<script src=\"./js/loggued.js\"></script>";
    } else {
      echo "<a id=\"noshoot\" class=\"btn btn-full\" href=\"#\">I WANT TO SHOOOOOT</a>";
      echo"<a class=\"btn btn-ghost\" href='#'>Show me some PIIIIIICS</a>";
      echo "<script src=\"./js/unloggued.js\"></script>";
    }
     ?>


  </div>
</header>
