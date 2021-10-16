<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Website System</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>                           
                         
                           
                            <a class="nav-link" href="member.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                                Member
                            </a>
                            <a class="nav-link" href="category.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Category
                            </a>
                            <a class="nav-link" href="menu.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hamburger"></i></div>
                                Menu
                            </a>

                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION["username"] ?>
                    </div>
                </nav>
            </div>