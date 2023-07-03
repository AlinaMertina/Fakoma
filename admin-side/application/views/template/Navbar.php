<style>
 
  .alin:hover{
    background-color: #02ED8C;
  }
  

  a.nav-link.alin:hover {
    background-color: white; /* Nouvelle couleur d'arrière-plan lors du survol */
  }
  .module{
    margin: 2%;
  }
  .navg:hover {
    background-color: white;
    text-decoration: none;
    color: black;
  }
  .navg{
    display: flex;
    background-color: #A6EBC9;
    color: black;
    font-family: serif;
    padding: 2%;
    text-align: center;
    padding-left: 5%;
    margin: 2%;
    margin-left: 3%;
    text-decoration: none;
  }
  a{
    text-decoration: none;
    color: white;
  }

.mdi{
  color: black;
}

</style>
<body>
  <div class="container-scroller body1">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas nav1" id="sidebar"  style="background-color:#77AB4C;font-family: serif; ">
    
      <div
        class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top"
        style="background-color:#FFFFFF;">
        <a class="sidebar-brand brand-logo" href="#"><img src="<?= base_url("assets/logo.png")
            ?>"
          alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="#"><img
            src="<?= base_url("assets/logo.png") ?>" alt="logo" /></a>
      </div>

      <ul class="nav"  style="position: fixed;width:15%" >
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                
              </div>
              <div class="profile-name">
               
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                class="mdi mdi-dots-vertical"></i></a>
            <div
              class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
              aria-labelledby="profile-dropdown">
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                  class="mdi mdi-dots-vertical"></i></a>
              <div
                class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account
                      settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change
                      Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do
                      list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>


          <li class="nav-item nav-category">
            <h4 style=" color:white;text-align: center;" > Gestion</h4>
            <hr style="borde-color: 1px solid #014A2B;background-color: white;" >
           <!-- Gestion Production -->
          </li>
          <li class="nav-item menu-items module">
              <a class="navg" href="<?= base_url("index.php/CT_Produit/index") ?>"  style="background-color: white;   opacity: 80%;">
                <span class="menu-icon" >
                <i class="mdi mdi-chair-school"></i>
                </span>
                <span class="menu-title"> Production</span>
              </a>
          </li>
          <!-- Fin  Gestion Production -->
                <!-- <li class="nav-item menu-items">
                  <a class="nav-link" data-toggle="collapse" href="#ui-basic"
                    aria-expanded="false"
                    aria-controls="ui-basic">
                    <span class="menu-icon">
                      
                      <i class="mdi mdi-chart-bar"></i>
                    </span>
                    <span class="menu-title">Stock</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="<?= bu("CT_Stock_Produit/inventory") ?>">Restant</a></li>
                      <li class="nav-item"> <a class="nav-link" href="<?= bu("CT_Stock_beneficiaire/levelStock") ?>">Beneficiaire</a></li>
                    </ul>
                  </div>
                </li> -->
          <!--Gestion Stocks -->
          </li>
            <li class="nav-item menu-items module" > 
              <a class="navg" href="<?= base_url("index.php/CT_Stock_Produit/inventory") ?>"  style="background-color: white;   opacity: 80%;">
                <span class="menu-icon">
                <i class="mdi mdi-server"></i>
                </span>
                <span class="menu-title"> Stocks</span>
              </a>
          </li>
          <!--Fin Gestion Stocks -->

          <!--Gestion Comptabiliter -->
          </li>
          <li class="nav-item menu-items module">
              <a class="navg" href="<?= base_url("index.php/CT_Gestion/input_journal") ?>"  style="background-color: white;   opacity: 80%;">
                <span class="menu-icon">
                <i class="mdi mdi-chart-pie"></i>
                </span>
                <span class="menu-title"> Comptable</span>
              </a>
          </li>
          <!--Fin Gestion Comptabiliter -->

          <!--Gestion Employeer -->
          </li>
            <li class="nav-item menu-items module">
              <a class="navg" href="<?= base_url("index.php/CT_CRUD_Employer/getAll_emp") ?>"  style="background-color: white;   opacity: 80%;">
                <span class="menu-icon">
                  <i class="mdi mdi-account-multiple"></i>
                </span>
                <span class="menu-title"> Employee</span>
              </a>
          </li>
          <!--Fin Gestion Comptabiliter -->

          <!-- <li class="nav-item menu-items">
            <a class="nav-link" href="<?= bu("CT_Optimisation") ?>">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Prévision de Recette</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link alin" href="<?= base_url("CT_emploie_du_temp") ?>" >
              <span class="menu-icon alin"  >
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Emplois du temp</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= base_url("CT_CRUD_Employer/getAll_emp") ?>">
              <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Employer</span>
            </a>
          </li> -->
         
          </ul>
        </nav>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <!-- partial:partials/_navbar.html -->
          <nav class="navbar p-0 fixed-top d-flex flex-row" style="background-color:#FFFFFF; ">
            
            <div
              class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
              
             
              <ul class="navbar-nav navbar-nav-right">
               
               
                <li class="nav-item dropdown border-left">
                  <a class="nav-link count-indicator dropdown-toggle"
                    id="messageDropdown" href="#"
                    data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-email"></i>
                    <span class="count bg-success"></span>
                  </a>
                </li>

               
                <li class="nav-item dropdown">
                <div class="col-12">
                  <button type="submit" style="background-color: #F33333;color:white" class="btn btn-primary">Deconnexion</button>
                </div>

                </li>
              </ul>
              <button
                class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
                type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
              </button>
            </div>
          </nav>
