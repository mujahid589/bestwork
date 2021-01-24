<?php
      session_start();ob_start();
      require "./database/db.php";
      require __DIR__."/functions/controller.php";
      require html."/header.inc.php";
      if(fLoggedin()){
        require html."/nav-loggedin.inc.php";
      }
      else if (cLoggedin()) {
        require html."/nav-loggedin-client.inc.php";
      }
      else {
      require html."/nav.inc.php";
      }
      require __DIR__."/functions/conditions.php";


      if(page=="" || page == "home"){
        require html."/home/main.php";

      }

      else if(page=="register"){
        require html."/register/main.php";
      }

      else if(page=="about"){
      }

      else if(page=="login"){
        require html."/login/main.php";
      }

      else if(page=="client-dashboard"){
        if(cLoggedin()){
          require html."/client-welcome/main.php";
        }
        else {
          redirect("login");
        }
      }

      else if(page=="freelancer-dashboard"){
        if(fLoggedin()){
          require html."/freelance-welcome/main.php";
        }
        else {
          redirect("login");
        }
      }
      else if(page=="jobs"){
        if(fLoggedin()){
          require html."/jobs/main.php";
        }
        else {
          redirect("login");
        }
      }
      else if(page=="complete-profile"){
        if(fLoggedin()){
          require html."/complete-profile/main.php";
        }
        else if(cLoggedin()){
          require html."/complete-profile-client/main.php";
        }
      }

      else if(page=="logout"){
        session_unset();
        session_destroy();
        $status="";
        redirect('login');
      }
      else if(page=="my-profile"){
        require html."/freelancer-my-profile/main.php";
      }
      else {
        require html."/404/main.php";
      }

      require html."/footer.inc.php";

  ?>
