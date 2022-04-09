<nav class="navbar navbar-expand-lg shadow-lg">
  <div class="container">
      <img src="<?php echo URLROOT ."assets/imgs/favicon.png"?>" width="30" height="30" alt="">
    <a class="navbar-brand ms-3 english" href="<?php echo URLROOT ?>">Tech By AP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">

        <!-- After user login show Admin Panel Link on nav bar -->
        <?php if(getUserSession() !=false) :?>
          <a class="nav-link english" aria-current="page" href="<?php echo URLROOT . 'admin/home' ?>">Admin Panel</a>
        </li>
        <?php endif; ?>
 
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle english" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">

          <!-- After user login show user name instead of Member -->
          <?php if(getUserSession() !=false) :?>
            <?php echo getUserSession()->name; ?>
          <?php else: ?>
            Member
          <?php endif; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php if(getUserSession() !=false) :?>
            <li><a class="dropdown-item english" href="<?php echo URLROOT .'user/logout' ?>">Logout</a></li>
            <?php else: ?>
            <li><a class="dropdown-item english" href="<?php echo URLROOT .'user/login' ?>">Login</a></li>
            <li><a class="dropdown-item english" href="<?php echo URLROOT .'user/register' ?>">Register</a></li>
            <?php endif; ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>





