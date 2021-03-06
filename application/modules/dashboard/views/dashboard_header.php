<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title><?= $activeHeaders ?></title>
  	<!-- Bootstrap plugin -->
  	<?=plugin_css('bootstrap/css/bootstrap.min.css');?>
    <?=plugin_css('bootstrap/css/bootstrap.css');?>
  	<!-- Font Awesome -->
  	<?=plugin_css('font_awesome/css/font-awesome.min.css');?>
  	<!-- Custom made css -->
  	<?=css('dashboard.css');?>
    <!-- Javascript -->
    <?=script('jquery.js');?>
    <?=plugin_script('bootstrap/js/bootstrap.min.js');?>
  </head>
  <body>
    <?php
      $userType = null;
      $userName = null;
      if ($this->session->userdata['user_isLoggedIn'] === false || empty($this->session->userdata['user_isLoggedIn'])) {
          redirect(base_url('login'));
      } else {
        $userType = $this->session->userdata['user_currentlyloggedIn']['userType'];
        $userName = $this->session->userdata['user_currentlyloggedIn']['username'];
      }
    ?>
    <div class="header">
       <div class="container">
          <div class="row">
             <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                   <h1><a href="index.html">NCR Inventory</a></h1>
                </div>
             </div>
             <div class="col-md-5">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="input-group form">
                         <input type="text" class="form-control" placeholder="Search...">
                         <span class="input-group-btn">
                           <button class="btn btn-primary" type="button">Search</button>
                         </span>
                    </div>
                  </div>
                </div>
             </div>
             <div class="col-md-2">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                      <ul class="nav navbar-nav">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $userName ?><b class="caret"></b></a>
                          <ul class="dropdown-menu animated fadeInUp">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="<?= base_url('login/logout') ?>">Logout</a></li>
                          </ul>
                        </li>
                      </ul>
                    </nav>
                </div>
             </div>
          </div>
       </div>
    </div>
   <div class="page-content">
      <div class="row">
        <div class="col-md-2">
          <div class="sidebar content-box" style="display: block;">
            <?php
              if ($userType === 'Admin') {
                $this->load->view('dashboard/sidebar_admin', array('activeHeaders' => $activeHeaders));
              } else if ($userType === 'Staff') {
                $this->load->view('dashboard/sidebar_staff', array('activeHeaders' => $activeHeaders));
              } else if ($userType === 'User') {
                $this->load->view('dashboard/sidebar_user', array('activeHeaders' => $activeHeaders));
              }
            ?>
