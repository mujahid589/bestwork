<div class="navigation-wrap bg-light start-header start-style" id="header">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-md navbar-light">

          <a class="navbar-brand" href="/" ><img src="/media/main/logo.png" alt=""></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto py-4 py-md-0">
              <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                <a class="nav-link" href="#"> <i class="fa fa-search"></i> &nbsp; </a>
              </li>
              <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                <a class="nav-link" href="#">Browse Professionals</a>
              </li>
              <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                <a class="nav-link" href="#">My Contracts</a>
              </li>
              <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                <a class="nav-link" href="/messages">Messages</a>
              </li>
              <li class="nav-item dropdown pl-4 pl-md-0 ml-0 ml-md-4">
                    <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown">
                      <i class="fa fa-question"></i>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Help & Suppprt</a>
                      <a class="dropdown-item" href="#">Community & Forums</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown pl-4 pl-md-0 ml-0 ml-md-4">
                        <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown">
                          <i class="fa fa-bell"></i>
                        </a>
                        <div class="dropdown-menu" style="width:300px;;position:absolute;right:-40px !important">
                        </div>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                  <a class="nav-link" href="#"> <i class="fa fa-user-circle"></i> <?php echo $user['name'] ?></a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                  <a class="nav-link" href="/logout"> <i class="fa fa-power-off"></i></a>
                </li>
            </ul>
          </div>

        </nav>
      </div>
    </div>
  </div>
</div>

<?php



if($client['status']==2 ){
        ?>
        <div class="container">
            <div class="row">
        <div class="col-md-12 ">
            <div class="_card text-left">
                    Your Profile is under review. it may take 24 to 72 hours to complete review. You can post job after getting approval. Meanwhile you can scroll platform for learning purposes.
            </div>
        </div>
            </div>
        </div>
    <?php
    }

?>
