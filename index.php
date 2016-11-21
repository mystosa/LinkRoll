<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">LinkRoll</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Acceuil</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

      <?php

        $data = file("liens.txt");

        $nbLine = count($data);

        $categories = array();          

        echo '<center><hr><h1>' . "Deux sites au hasard" . '</h1></center>';

        $id = array_rand($data);
        $id2 = array_rand($data);       

        while ($id == $id2)
        {
          $id2 = array_rand($data);
        }

        $values = explode(',', $data[$id]);
        $values2 = explode(',', $data[$id2]);

        echo '<div class="row">';
        echo '<div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                        <img src="http://www.apercite.fr/api/apercite/240x180/yes/http://' . $values[0] . '/" alt="...">
                        <div class="caption">
                          <h3><center>' . $values[0] . '</center></h3>
                          <p><center><a href="http://' . $values[0] . '" class="btn btn-danger" role="button" alt="Miniature du site de pêche">Entrer</a></center></p>
                        </div>
                      </div>
                    </div>';
                          

        echo '<div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                        <img src="http://www.apercite.fr/api/apercite/240x180/yes/http://' . $values2[0] .' ">
                        <div class="caption">
                          <h3><center>' . $values2[0] . '</center></h3>
                          <p><center><a href="http://' . $values2[0] . '" class="btn btn-danger" role="button" alt="Miniature du site de pêche">Entrer</a></center></p>
                        </div>
                      </div>
                    </div>';
                    echo '</div>';  
                    
        for ($i = 0; $i < $nbLine; $i++) {
          $values = explode(',', $data[$i]);
          $cat = $values[1];
          if (!in_array($cat, $categories)) {
            $categories[] = $cat;
          }
        }       

        sort($categories); 
        sort($data);

        $n = 0;
        $b = false;
        foreach ($categories as $cat) {
          if ($n != 0 && !$b) {
            echo '</div>';
          }
          echo '<h1><center>' . $cat . '</center></h1><hr>';
          $o = 0;
          for ($i = 0; $i < $nbLine; $i++) {
            $values = explode(',', $data[$i]);
            if ($cat == $values[1]) {
              $b = false;
              if ($o == 0) {
                echo '<div class="row">';
              }
              echo '<div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                        <img src="http://www.apercite.fr/api/apercite/240x180/yes/http://' . $values[0] . ' ">
                        <div class="caption">
                          <h3><center>' . $values[0] . '</center></h3>
                          <p><center><a href="http://' . $values[0] . '" class="btn btn-info" role="button" alt="Miniature du site de pêche">Entrer</a></center></p>
                        </div>
                      </div>
                    </div>';
              $o++;
              if ($o == 3) {
                echo '</div>';
                $b = true;
                $o = 0;
              }
            }
          }
          $n++;
        }
        

      ?>

    </div> <!-- /container -->

    <!-- Page Content -->
  
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
