<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="home.php" style="font-weight: bold;">EPST::Maccabe</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo (!empty($user['Photo'])) ? 'images/images_db/'.$user['Photo'] : 'images/user.png'; ?>" alt="User Image" style="width: 100%; max-width: 45px; height: auto;">
        <div>
          <p class="app-sidebar__user-name" style="text-transform: lowercase; font-weight: bold;"><?php echo $user['Username']; ?></p>
        </div>
      </div>
      <ul class="app-menu">
      
        <li><a class="app-menu__item" href="home.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Questionnaires</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
                         <?php
                            $conn = $pdo->open();

                            try{
                            $stmt = $conn->prepare("SELECT * FROM t_section ORDER BY Section");
                            $stmt->execute();
                            foreach($stmt as $section){
                              echo "
                              <li style='text-transform: lowercase;'><a class='treeview-item' href='question.php?id=".$section['IdSection']."'><i class='icon fa fa-circle-o'></i> ".$section['Section'].' '.$section['Option']."</a></li>
                              ";
                                }
                              }
                              catch(PDOException $e){
                              echo $e->getMessage();
                              }

                              $pdo->close();
                          ?>
          </ul>
        </li>
        <li><a class="app-menu__item" href="user.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Utilisateurs</span></a></li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Configurations</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="section.php"><i class="icon fa fa-circle-o"></i> Sections</a></li>
            <li><a class="treeview-item" href="cours.php"><i class="icon fa fa-circle-o"></i> Cours</a></li>
            <li><a class="treeview-item" href="eleve.php"><i class="icon fa fa-circle-o"></i> Eleves</a></li>
            <li><a class="treeview-item" href="annee.php"><i class="icon fa fa-circle-o"></i> Annees</a></li>
          </ul>
        </li>
        
      </ul>
    </aside>