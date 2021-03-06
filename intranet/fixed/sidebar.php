<?php
$permisos_usuario = $_SESSION['permisos'];
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
<!--                    <div class="profile-image">-->
<!--                        <img src="../../vendors/assets/images/faces/face1.jpg" alt="profile image">-->
<!--                    </div>-->
                    <div class="text-wrapper">
                        <p class="profile-name">SEAQ SAC</p>
                        <div>
                            <small class="designation text-muted"><?php echo $_SESSION['username']?></small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Inicio</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#facturacion" aria-expanded="false" aria-controls="facturacion">
                <i class="menu-icon mdi mdi-receipt"></i>
                <span class="menu-title">Facturacion</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="facturacion">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="../contents/ver_clientes.php">Clientes</a>
                    </li>
                    <?php if ($permisos_usuario['1'] != 0 ) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="../contents/ver_ventas.php">Venta</a>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#compras" aria-expanded="false" aria-controls="compras">
                <i class="menu-icon mdi mdi-sale"></i>
                <span class="menu-title">Compras - Gastos</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="compras">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="../contents/ver_proveedores.php">Proveedores</a>
                    </li>
                    <?php if ($permisos_usuario['2'] != 0 ) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../contents/ver_compras.php">Compras SUNAT</a>
                        </li>
                        <?php
                    }
                    if ($permisos_usuario['4'] != 0 ) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../contents/ver_contrato.php">Contratos</a>
                        </li>
                        <?php
                    }
                    if ($permisos_usuario['5'] != 0 ) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../contents/ver_pagos_frecuentes.php">Pagos Frecuentes</a>
                        </li>
                        <?php
                    }
                    if ($permisos_usuario['3'] != 0 ) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="../contents/ver_gastos.php">Gastos</a>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#operaciones" aria-expanded="false" aria-controls="operaciones">
                <i class="menu-icon mdi mdi-star"></i>
                <span class="menu-title">Operaciones</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="operaciones">
                <ul class="nav flex-column sub-menu">
                    <?php
                    if ($permisos_usuario['8'] != 0 ) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../contents/ver_presupuestos.php">Presupuestos</a>
                        </li>
                        <?php
                    }
                    if ($permisos_usuario['9'] != 0 ) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../contents/ver_orden_interna.php">Orden Interna</a>
                        </li>
                        <?php
                    }
                    if ($permisos_usuario['10'] != 0 ) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="../contents/ver_orden_servicio.php">Orden de Servicio</a>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../contents/ver_equipos.php">
                <i class="menu-icon mdi mdi-water-percent"></i>
                <span class="menu-title">Equipos</span>
            </a>
        </li>
        <?php
                    if ($permisos_usuario['7'] != 0 ) {?>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bancos" aria-expanded="false" aria-controls="tablas">
                <i class="menu-icon mdi mdi-box"></i>
                <span class="menu-title">Caja - Bancos</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="bancos">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="../contents/ver_bancos.php"> Bancos</a>
                    </li>
                </ul>
            </div>
        </li>
        <?php }?>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#resultados" aria-expanded="false" aria-controls="resultados">
                <i class="menu-icon mdi mdi-content-copy"></i>
                <span class="menu-title">Resultados</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="resultados">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="../contents/ver_informe_monitoreos.php">Informes Monitoreos</a>
                    </li>
                    <?php
                    if ($permisos_usuario['14'] != 0 ) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="../contents/ver_capacitaciones_clientes.php">Capacitaciones</a>
                    </li>
                    <?php }?>
                    <li class="nav-item">
                        <a class="nav-link" href="../contents/ver_informe_auditorias.php">Auditorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contents/ver_plan_residuos.php">Plan Residuos solidos</a>
                    </li>
                </ul>
            </div>
        </li>
        <?php
        if ($permisos_usuario['11'] != 0 ) { ?>
            <li class="nav-item">
                <a class="nav-link" href="../contents/ver_usuarios.php">
                    <i class="menu-icon mdi mdi-water-percent"></i>
                    <span class="menu-title">Usuarios</span>
                </a>
            </li>
            <?php
        }
        if ($permisos_usuario['12'] != 0 ) { ?>
            <li class="nav-item">
                <a class="nav-link" href="../contents/ver_empresas.php">
                    <i class="menu-icon mdi mdi-home"></i>
                    <span class="menu-title">Empresas</span>
                </a>
            </li>
            <?php
        }
        if ($permisos_usuario['13'] != 0 ) {?>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tablas" aria-expanded="false" aria-controls="tablas">
                <i class="menu-icon mdi mdi-restart"></i>
                <span class="menu-title">Tablas Generales</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tablas">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="../contents/ver_documentos_sunat.php"> Documentos SUNAT </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contents/ver_tipos_codigo.php"> Tabla Clasificacion </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contents/ver_permisos.php"> Permisos </a>
                    </li>
                </ul>
            </div>
        </li>
        <?php }?>
    </ul>
</nav>