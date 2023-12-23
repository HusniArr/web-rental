<!--Header-part-->
<div id="header">
    <h1><a href="#">Admin Panel</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
  <div id="user-nav" class="navbar navbar-inverse">
      <ul class="nav">
        <li class="">
          <a title="" href="#"
            ><i class="icon icon-user"></i> <span class="text">Profile</span></a
          >
        </li>
        <li class="">
          <a title="Logout" href="<?php echo APP_PATH?>/logout"
            ><i class="icon icon-share-alt"></i>
            <span class="text">Logout</span></a
          >
        </li>
      </ul>
    </div>
    <div id="search">
      <input type="text" placeholder="Search here..." />
      <button type="submit" class="tip-left" title="Search">
        <i class="icon-search icon-white"></i>
      </button>
    </div>
    <!--close-top-Header-menu-->