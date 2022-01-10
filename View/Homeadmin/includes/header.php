 <!DOCTYPE html>
  <html>
    <head>

      <?php if($nome == "Home"): ?>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Situação', 'Número de livros'],
          ['Alugados',     <?php echo $livros_alugados;?>],
          ['Disponíveis',      <?php echo count($livros)-$livros_alugados;?>]
          ]);

        var options = {
          title: 'Quantidade de livros disponíveis'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

   

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Aluguéis'],
          ['<?php echo $data4->format('d/m');?>',  <?php echo $data_4;?>],
          ['<?php echo $data3->format('d/m');?>',  <?php echo $data_3;?>],
          ['<?php echo $data2->format('d/m');?>',  <?php echo $data_2;?>],
          ['<?php echo $data1->format('d/m');?>',  <?php echo $data_1;?>],
          ['<?php echo $data->format('d/m');?>',  <?php echo $data_;?>]
        ]);

        var options = {
          title: 'Livros Alugados nos últimos dias',
          legend: { position: 'bottom' }
        };

        var chart2 = new google.visualization.LineChart(document.getElementById('curve_chart2'));

        chart2.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Gênero', 'Quantidades'],
          ['Romance',     <?php echo $nicho['Romance'];?>],
          ['Infantil',      <?php echo $nicho['Infantil'];?>],
          ['Ficção científica',  <?php echo $nicho['Ficção científica'];?>],
          ['Fantasia', <?php echo $nicho['Fantasia'];?>],
          ['Ciências Humanas',    <?php echo $nicho['Ciências Humanas'];?>],
          ['Psicologia', <?php echo $nicho['Psicologia'];?>]
        ]);

        var options = {
          title: 'Divisão de nichos de livros cadastrados',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

     <?php endif; ?>

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
        <nav class="navbar white">
          <div class="nav-wrapper"><center><a href="#!" class="brand-logo blue-text text-darken-4"><?php echo $nome ?></a></center>
            <ul id="nav-mobile" class="right">
              <li class="hide-on-med-and-down"><a href="/products/admin" class="blue-text text-darken-4">Código-Projeto</a></li>
              <li class="hide-on-med-and-down"><a href="#!" data-target="dropdown1" class="dropdown-trigger waves-effect "><i class="material-icons blue-text text-darken-4">notifications</i></a></li>
            </ul><a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons blue-text tex-darken-4">menu</i></a>
          </div>
        </nav>
      </div>
      <ul id="sidenav-left" class="sidenav sidenav-fixed blue-grey darken-4">
        <center>
        <li class="white"><img src="../imagens/logo.svg" width="105px"></li>
        <br>
        <li>
            <div class="row valign-wrapper">
                <div class="col s1"></div>
                <div class="col s3"><img src="../imagens/<?php echo $dados['foto']; ?>" class="circle responsive-img" width="60px"></div>
                <div class="col s8"><h6><p class=" left white-text"><?php echo $dados['nome'] ?></p></h6></div>
            </div>
          </li>
        <li class="large"><a class="btn-large white blue-text text-darken-4" href="index.php">Home</a></li>
        <li class="large"><a class="btn-large white blue-text text-darken-4" href="cadastrarlivro.php">Cadastrar Livros</a></li>
        <li class="large"><a class="btn-large white blue-text text-darken-4" href="editarlivros.php?pag=1&ini=1">Editar Livros</a></li>
        <li class="large"><a class="btn-large white blue-text text-darken-4" href="editarusuario.php?pag=1&ini=1">Editar Usuários</a></li>
        <li class="large"><a class="btn-large white blue-text text-darken-4" href="editarperfil.php">Editar Perfil</a></li>
        <li class="large"><a class="btn-large white red-text text-darken-4" href="../../App/Controller/logout.php">Sair</a></li>
        </center>
      </ul>

    </header>