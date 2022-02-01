<body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <!-- <div class="logo">
        <h1>EPST</h1>
      </div> -->
      <div class="login-box">
        <form class="login-form" method="POST" action="verify.php">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SE CONNECTER</h3>
          <?php
						if(isset($_SESSION['error'])){
							echo "
								<p style='color: red; text-align: center;'>".$_SESSION['error']."</p> 
							
							";
							unset($_SESSION['error']);
						}
						?>
          <div class="form-group">
            <label class="control-label">MATRICULE</label>
            <input class="form-control" type="text" name="matricule" placeholder="Votre matricule" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">MOT DE PASSE</label>
            <input class="form-control" type="password" name="password" placeholder="Votre mot de passe">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">N'avez-vous pas un compte ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <!-- <button class="btn btn-primary btn-block" name="connect"><i class="fa fa-sign-in fa-lg fa-fw"></i>CONNECTER</button> -->
            <input class="btn btn-primary btn-block" type="submit" name="connect" class="btn login_btn" value="CONNECTER">
          </div>
        </form>
        <form class="forget-form" action="https://pratikborsadiya.in/vali-admin/index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>