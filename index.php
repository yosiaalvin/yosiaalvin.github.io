<!doctype html>

<?php
    include "includes/config.php";
    $query = mysqli_query($connection, "Select * from area");

    $destinasi = mysqli_query($connection, "Select * from kategori, destinasi, fotodestinasi
                                            where kategori.kategoriID = destinasi.kategoriID and destinasi.destinasiID = fotodestinasi.destinasiID");

    $sql = mysqli_query($connection, "Select * from destinasi");
    $jumlah = mysqli_num_rows($sql);

    $foto = mysqli_query($connection, "Select * from fotodestinasi");
?>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Wisata</title>
</head>
<body>

  <!-- Menu start -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Area
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
            if(mysqli_num_rows($query) > 0){
                while ($row = mysqli_fetch_array($query)){
        ?>
                    <a class="dropdown-item" href="#"><?php echo $row["areanama"]?></a>
        <?php
                }
            }
        ?>
          
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div> 
    </nav>
  <!-- Menu End -->

  <!-- Slider Start -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="Images/16489_mountain-wallpapers-pc-backgrounds_3966x2644_h.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
            <h1>Photo 1</h1>
            <p>Sebuah photo yang tidak tahu diambil oleh siapa.</p>
        </div>
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="Images/a-street-in-japan-wallpaper.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="Images/photo-1563206706-37fc22744de1.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
    <!-- Slider End -->

    <!-- Main Display 1 Start -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

            <?php
                if(mysqli_num_rows($destinasi) >0 ){
                    while ($row2 = mysqli_fetch_array($destinasi)){
            ?>            

                <div class="media">
                    <div class="media-body">
                        <h4 class="mt-0 mb-1"><?php echo $row2["destinasinama"]?></h4>
                        <h5><?php echo $row2["destinasialamat"]?></h5>
                        <p><?php echo $row2["kategoriKeterangan"]?></p>
                    </div>
                    <img class="ml-3" style="width: 200px; height: 100%;" src="images/<?php echo $row2["fotofile"]?>" alt="Gambar Tidak Ada">
                </div>
            
            <?php
                    }
                }
            ?>

            </div>
            <div class="col-sm-4">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah Obyek Wisata
                        <span class="badge badge-primary badge-pill"><?php echo $jumlah ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Dapibus ac facilisis in
                        <span class="badge badge-primary badge-pill">2</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Morbi leo risus
                        <span class="badge badge-primary badge-pill">1</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Main Display 1 End -->

    <!-- Galery Start -->
    <div class="container">
        <div class="row">

        <?php
            while ($row3 = mysqli_fetch_array($foto)){
        ?>

            <div class="col-sm-4">
                <figure class="figure">
                    <img src="Images/<?php echo $row3["fotofile"]?>" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                    <figcaption class="figure-caption text-right"><?php echo $row3["fotonama"]?></figcaption>
                </figure>
            </div>
        <?php 
            } 
        ?>

        </div>
    </div>
    <!-- Galery End -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>