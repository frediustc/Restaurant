<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $_page ?></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['id'])): ?>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <p><?php echo $u['fn'] ?></p>
                            <i class="ti-user"></i>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">

                            <p>LogOut</p>
                            <i class="ti-new-window"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (!isset($_SESSION['id'])): ?>
                    <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-new-window"></i>
                                <p>Connection</p>
                                <b class="caret"></b>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target=".bs-login">LogIn</a></li>
                            <li><a href="#" data-toggle="modal" data-target=".bs-register">Register</a></li>
                          </ul>
                    </li>

                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php if (!isset($_SESSION['id'])): ?>
    <!-- Large modal -->

    <div class="modal fade bs-login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog" role="document">
        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Login</h4>
                  </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email</label><br>
                        <input type="email" class="form-control border-input" required name="em">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label><br>
                        <input type="password" class="form-control border-input" required name="ps">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-fill" name="login">LogIn</button>
                  </div>
            </div>
        </form>
      </div>
    </div>

    <!-- Small modal -->

    <div class="modal fade bs-register" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
          <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" >Register</h4>
                    </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <label>Fullname</label><br>
                          <input type="text" class="form-control border-input" required name="fn">
                      </div>
                      <div class="form-group">
                          <label>Email</label><br>
                          <input type="email" class="form-control border-input" required name="em">
                      </div>
                      <div class="form-group">
                          <label>Number</label><br>
                          <input type="text" class="form-control border-input" required name="nb">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Password</label><br>
                          <input type="password" class="form-control border-input" required name="ps">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Retype Password</label><br>
                          <input type="password" class="form-control border-input" required name="cn">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success btn-fill" name="register">Register</button>
                    </div>
              </div>
          </form>
        </div>
    </div>

<?php endif; ?>
