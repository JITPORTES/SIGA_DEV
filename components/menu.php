<aside class="main-sidebar">
    
    <section class="sidebar">	  
      <ul class="sidebar-menu" id="menudinamico"></ul>
    </section>

  <br>
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->  
    <section class="sidebar">
      <ul class="sidebar-menu">
      <?php if(in_array(1, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>Seguridad IT</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
            <?php   if(in_array(2, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
              <li><a href="#noir" onclick="loadOptionBandejas('view/seguridad/usuarios.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','5288');Activa_btn_menu('li_sub_1', 'S')"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Usuarios</a></li>
            <?php } if(in_array(3, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){?>
              <li><a href="#noir" onclick="loadOptionBandejas('view/seguridad/perfil.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','5288');Activa_btn_menu('li_sub_1', 'S')"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Perfil</a></li>
            <?php } if(in_array(4, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){?>
              <li><a href="#noir" onclick="loadOptionBandejas('view/seguridad/permisos.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','5288');Activa_btn_menu('li_sub_1', 'S')"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Permisos</a></li>
            <?php } if(in_array(5, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){?>
              <li><a href="#noir" onclick="loadOptionBandejas('view/seguridad/menu.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','5288');Activa_btn_menu('li_sub_1', 'S')"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Menú</a></li>
            <?php } ?>
            </ul>
        </li>
        <?php }?>
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->  
          <!-- <li><a href="#noir"><i class="fa fa-file-text-o"></i> <span>INVENTARIO</span></a></li>
          <li><a href="#noir"><i class="fa fa-check-circle-o"></i> <span>VALE RESGUARDO</span></a></li>
          <li><a href="#noir"><i class="fa fa-check-square-o"></i> <span>VERIFICACIÓN</span></a></li> -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->  
    <?php if(in_array(6, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
        <li class="treeview"><a href="#"><i class="fa fa-desktop" aria-hidden="true"></i><span>Support</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
          <ul class="treeview-menu">
          <?php   if(in_array(7, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
            <li><a href="#noir" onclick="loadOptionBandejas('view/support/vale_de_resguardo/siga_vale_de_resguardo.php','contenedorprincipalactivofijo',''); Activa_btn_menu('li_sub_1', 'S')"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Vale de Resguardo</a></li>
          <?php } if(in_array(9, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){?>  
            <li><a href="#noir"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Asignación Masiva</a></li>
          <?php } if(in_array(11, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){?> 
            <li><a href="#noir"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Devolución Activos</a></li>
          <?php } ?>
          </ul>
        </li>
    <?php }?>
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->  
  <?php if(in_array(14, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
    <li class="treeview"><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i></i><span>Administración</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
      <?php   if(in_array(15, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
        <li>
          <li><a href="#noir" onclick="loadOptionBandejas('view/admin/catalogo.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','5288');Activa_btn_menu('li_sub_1', 'S')"><i class="fa fa-cubes" aria-hidden="true"></i>Catálogos</a></li>
        </li>
      <?php } ?>
        </ul>
    </li>
  <?php }?>
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <?php if(in_array(12, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
    
    <li class="treeview"><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i><span>Cubo</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
      <ul class="treeview-menu">
      <?php if(in_array(13, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
        <li><a href="#noir" onclick="loadOptionBandejas('view/cubo/tickets.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo',''); Activa_btn_menu('li_sub_1', 'S')"><i class="fa fa-cubes" aria-hidden="true"></i>Tickets</a></li>
      <?php } if(in_array(24, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){?>      
      <li><a href="#noir" onclick="loadOptionBandejas('view/cubo/bajaActivos.php','contenedorprincipalactivofijo',''); Activa_btn_menu('li_sub_1', 'S')"><i class="fa fa-cubes" aria-hidden="true"></i>Baja Activos</a></li>
      <?php } ?>
      </ul>
    </li>

  <?php }?>

  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->

  <?php if(in_array(25, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>

<li class="treeview"><a href="#"><i class="fa fa-stethoscope" aria-hidden="true"></i><span>Biomédica</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

  <ul class="treeview-menu">

    <?php if(in_array(28, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
      <li><a href="#noir" onclick="loadOptionBandejas('view/biomedica/rutinas/siga_rutinas.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','');"><i class="fa fa-laptop" aria-hidden="true"></i>Rutinas</a></li>
    <?php } ?>

    <?php if(in_array(26, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
      <!-- <li><a href="#noir" onclick="loadOptionBandejas('view/biomedica/siga_activos.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','');"><i class="fa fa-laptop" aria-hidden="true"></i>Activos</a></li> -->
    <?php } ?>

    <?php if(in_array(27, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
      <!-- <li><a href="#noir" onclick="loadOptionBandejas('view/biomedica/siga_baja_activos.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','');"><i class="fa fa-laptop" aria-hidden="true"></i>Activos Baja</a></li> -->
    <?php } ?>

    <?php if(in_array(32, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
      <li><a href="#noir" onclick="loadOptionBandejas('view/biomedica/tickets/ticketsAdmin.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','');"><i class="fa fa-ticket" aria-hidden="true"></i>Tickets</a></li>
    <?php } ?>

    <?php if(in_array(33, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
      <li><a href="#noir" onclick="loadOptionBandejas('view/biomedica/reportesActivos/siga_reportes_activos.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','');"><i class="fa fa-cog" aria-hidden="true"></i>Reportes</a></li>
    <?php } ?>

    <?php if(in_array(33, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
      <li><a href="#noir" onclick="loadOptionBandejas('view/biomedica/proveedores/proveedores.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','');"><i class="fa fa-users" aria-hidden="true"></i>Proveedores</a></li>
    <?php } ?>

    <?php if(in_array(33, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
      <li><a href="#noir" onclick="loadOptionBandejas('view/biomedica/detalleTecnico/detalleTecnico.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','');"><i class="fa fa-database" aria-hidden="true"></i>Detalle Técnico</a></li>
    <?php } ?>

    <?php if(in_array(33, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
      <li><a href="#noir" onclick="loadOptionBandejas('view/biomedica/hidroSanitario/hidroSanitario.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','');"><i class="fa fa-book" aria-hidden="true"></i>HidroSanitario</a></li>
    <?php } ?>
  </ul>

</li>

<?php } ?>

  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->


<?php if(in_array(0, $sigaUsuarioPerfilPermiso)){ ?>

  <li class="treeview"><a href="#"><i class="fa fa-laptop" aria-hidden="true"></i><span>TIC</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

    <ul class="treeview-menu">

      <?php   if(in_array(26, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
        <li><a href="#noir" onclick="loadOptionBandejas('view/biomedica/siga_activos.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','');Activa_btn_menu('li_sub_1', 'S')"><i class="fa fa-laptop" aria-hidden="true"></i>Activos</a></li>
      <?php } ?>

      <?php if(in_array(7, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
        <li><a href="#noir" onclick="loadOptionBandejas('view/support/vale_de_resguardo/siga_vale_de_resguardo.php','contenedorprincipalactivofijo',''); Activa_btn_menu('li_sub_1', 'S')"><i class="fa fa-file-text-o" aria-hidden="true"></i>Vale de Resguardo</a></li>
      <?php } ?>

    </ul>

  </li>

<?php }?>
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->

<?php if(in_array(25, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
<li>
<!-- <a href="#noir" onclick="loadOptionBandejas('view/biomedica/reportesActivos/siga_reportes_activos.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','');Activa_btn_menu('li_sub_1', 'S')"><i class="fa fa-cog" aria-hidden="true"></i>Reportes</a> -->
  <a href="#noir" onclick="loadOptionBandejas('view/admin/mesaDeAyuda/gestor/ticketsGestor.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','');Activa_btn_menu('li_sub_1', 'S')">
    <i class="fa fa-ticket"></i><span>MIS TICKETS</span>
    <span class="pull-right-container"></span>
  </a>
  
</li>
<?php } ?>

  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->

  <?php if(in_array(25, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
<li>
<!-- <a href="#noir" onclick="loadOptionBandejas('view/biomedica/reportesActivos/siga_reportes_activos.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','');Activa_btn_menu('li_sub_1', 'S')"><i class="fa fa-cog" aria-hidden="true"></i>Reportes</a> -->
  <a href="#noir" onclick="loadOptionBandejas('view/admin/inventario/inventario.view.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','');">
    <i class="fa fa-archive" aria-hidden="true"></i><span>INVENTARIO</span>    
  </a>
  
</li>
<?php } ?>

  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->

<!-- <li class="treeview">
    <a href="#"><i class="fa fa-wrench"></i> 
    <span>ACTIVIDADES</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
	
		<ul class="treeview-menu">
				<li id="li_sub_1">
					<a href="#noir" onclick="loadOptionBandejas('mantenimiento-predictivo.php?Id_Menu=4&Id_Submenu=1','contenedorprincipalactivofijo','5288');Activa_btn_menu('li_sub_1', 'S')">
						<i class="fa fa-circle-o"></i>Mant Predictivo</a>
				</li>
				<li id="li_sub_2">
					<a href="#noir" onclick="loadOptionBandejas('mantenimiento-preventivo.php?Id_Menu=4&Id_Submenu=2','contenedorprincipalactivofijo','5289');Activa_btn_menu('li_sub_2', 'S')">
						<i class="fa fa-circle-o"></i>Mant Preventivo</a>
				</li>
				<li id="li_sub_3">
					<a href="#noir" onclick="loadOptionBandejas('mantenimiento-correctivo.php?Id_Menu=4&Id_Submenu=3','contenedorprincipalactivofijo','5290');Activa_btn_menu('li_sub_3', 'S')">
						<i class="fa fa-circle-o"></i>Mant Externo</a>
				</li>
				<li id="li_sub_4">
					<a href="#noir" onclick="loadOptionBandejas('capacitaciones.php?Id_Menu=4&Id_Submenu=4','contenedorprincipalactivofijo','5291');Activa_btn_menu('li_sub_4', 'S')">
						<i class="fa fa-circle-o"></i>Capacitacion</a>
				</li>
				<li id="li_sub_2042">
					<a href="#noir" onclick="loadOptionBandejas('ticket_reasignacion.php?Id_Menu=4&Id_Submenu=2042','contenedorprincipalactivofijo','5292');Activa_btn_menu('li_sub_2042', 'S')">
						<i class="fa fa-circle-o"></i>Reasignación Ticket</a>
				</li>
		</ul>
	</li> -->

  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->
  <!------------------------------------------------------------------------------------------------------------------------------------------------------  -->

      </ul>
    </section>

  </aside>