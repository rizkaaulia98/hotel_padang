
<ul class="sidebar-menu" id="nav-accordion">
  <p class="centered"><a href="profile.html"><img src="../../_foto/2.jpeg" class="img-circle" width="60"></a></p>
  <h5 class="centered"><p><?php echo $_SESSION['username']; ?></p></h5>

  <li class="mt">
      <a href="../">
        <i class="fa fa-dashboard"></i>
          <span>User Access</span>
      </a>
  </li>
  <li class="sub-menu">
      <a href="?page=chart">
          <i class="fa fa-bar-chart-o"></i>
          <span>Traffict</span>
      </a>
  </li>
  <li class="sub-menu">
      <a href="?page=home">
          <i class="fa fa-building-o"></i>
          <span>List Hotel</span>
      </a>
  </li>
  <li class="sub-menu">
      <a href="?page=fasilitas">
          <i class="fa fa-lightbulb-o"></i>
          <span>Facility</span>
      </a>
  </li>
  <!-- <li class="sub-menu">
      <a href="?page=roomtype">
          <i class="fa fa-book"></i>
          <span>Room Type</span>
      </a>
  </li> -->
  <li class="sub-menu">
      <a href="?page=pass_change">
          <i class="fa fa-cog"></i>
          <span>Change Password</span>
      </a>
  </li>
  <li class="sub-menu">
      <a href="?page=manage_user">
          <i class="fa fa-sitemap"></i>
          <span>Manage User</span>
      </a>
  </li>
  <li class="sub-menu">
                      <a class="active" href="../../">
                          <i class="fa fa-chevron-circle-left"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
</ul>
