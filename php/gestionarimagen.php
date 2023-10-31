
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/boostrap/bootstrap513/css/bootstrap.min.css">
   <link rel="stylesheet" href="/boostrap/bootstrap513/js/bootstrap.bundle.js">
    <link rel="stylesheet" href="css/galeria.css">
   
    <title>Gallery international</title>
</head>
<body style="background-color:rgb(255, 255, 255)">
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Gallery International</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link btn btn-success" href="../php/usuarioo.php">Volver</a>
            </li>
            
       <div> 
    </nav>
</ul>

<div class="collapse navbar-collapse pull-right" id="navbar">
    <ul class="nav navbar-nav navbar-left">
        <?php if(isset($_SESSION['nomUsuario'])){  ?>
            <li>
                <p class="navbar-text"><strong>Hola de nuevo!!</strong>Ha ingresado como<strong><a href=""><?php echo $_SESSION['nomUsuario'];?>|
                <a href="index.php">
        </li>
                  <?php } else{ ?>
                <li>
                   <p class="navbar-text">Has salido del sistema!!</p>
              </li> <br>
                   <li><a href="html/administrador.html">Acceder</a></li>
                       <?php } ?>
  </ul>
</div>

                  </body>
</html>
