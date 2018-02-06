<!--Barra de Navegacion-->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Cambiar Navegacion</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="../Views/principal.php" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> Gestor</a>


    <ul class="nav navbar-nav navbar-left">
      <li><a href="javascript: void(0)" class="navbar-brand" data-toggle="dropdown"><?=$_SESSION['cargotipo']; ?><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a  href="../views/line.php" >Line table</a></li>
          <?php if($_SESSION['m_cuenta']==1) { ?>
          <li><a  href="../cuenta/cuentas.php" >Cuentas</a></li>
           <?php } ?>
        <?php if($_SESSION['cargo']==0) { ?>
        <li><a  href="../cuenta/notas.php" >Notas</a></li>
         <?php } ?>

              </ul>
      </div>

      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../Views/conversor.php" >Conversor</a></li>
          <li><a href="../Views/indice.php" >Procedimientos</a></li>


          <li>
            <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nombre']; ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a  href="../cuenta/perfil.php" ><span class='glyphicon glyphicon-user'></span> Perfil</a></li>
              <li><a href="javascript: void(0)" onclick='cerrar();'><span class='glyphicon glyphicon-log-out'></span> Cerrar Session</a></li>

            </ul>

          </li>


        </div>
      </nav>
