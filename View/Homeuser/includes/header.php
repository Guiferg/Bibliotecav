 <!DOCTYPE html>
  <html>
    <head>
        <meta charset="utf-8">
        <title>Preojeto Biblioteca</title>
       <!--Import Google Icon Font-->
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <!--Import materialize.css-->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

       <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body class="has-fixed-sidenav blue lighten-1"> 

    <header>
      <div class="navbar-fixed">
        <nav class="navbar blue darken-4">
          <div class="nav-wrapper"><center><a href="#!" class="brand-logo text-white"><?php echo $nome; ?></a></center>
            <ul id="nav-mobile" class="right">
              <li class="hide-on-med-and-down"><a href="/products/admin">Código-Projeto</a></li>
              <li class="hide-on-med-and-down"><a href="#!" data-target="dropdown1" class="dropdown-trigger waves-effect"><i class="material-icons">notifications</i></a></li>
            </ul><a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons black-text">menu</i></a>
          </div>
        </nav>
      </div>
      <ul id="sidenav-left" class="sidenav sidenav-fixed blue-grey darken-4">
        <center>
        <li class="blue darken-4"><img src="../imagens/logo.svg" width="105px"></li>
        <br>
        <li>
            <div class="row valign-wrapper">
                <div class="col s1"></div>
                <div class="col s3"><img src="../imagens/<?php echo $dados['foto'];?>" class="circle responsive-img" width="60px"></div>
                <div class="col s8"><h6><p class=" left white-text"><?php echo $dados['nome'] ?></p></h6></div>
            </div>
          </li>
        <li class="large"><a class="btn-large blue darken-4" href="index.php">Home</a></li>
        <li class="large"><a class="btn-large blue darken-4" href="alugarlivro.php?pag=1&ini=1">Alugar Livros</a></li>
        <li class="large"><a class="btn-large blue darken-4" href="devolverlivro.php">Devolver Livros</a></li>
        <li class="large"><a class="btn-large blue darken-4" href="multas.php">Multas</a></li>
        <li class="large"><a class="btn-large blue darken-4" href="editarperfil.php">Editar Perfil</a></li>
        <li class="large"><a class="btn-large blue darken-4 red-text text-lighten-1" href="../../App/Controller/logout.php">Sair</a></li>
        </center>
      </ul>

    </header>