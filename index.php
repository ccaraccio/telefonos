<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="Shortcut Icon" HREF="imagenes/AGP.JPG"> 
<title>&Iacute;ndice Telef&oacute;nico</title>
<link href="css/metro-bootstrap.css" rel="stylesheet">
	<link href="css/metro-bootstrap-responsive.css" rel="stylesheet">
	<link href="css/docs.css" rel="stylesheet">
	<link href="js/prettify/prettify.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
        <link href="css/metro-icons.css" rel="stylesheet">
        <link href="css/nuevoEstilo.css" rel="stylesheet">
	<!-- Load JavaScript Libraries -->
	<script src="js/jquery/jquery.min.js"></script>
	<script src="js/jquery/jquery.widget.min.js"></script>
	<script src="js/jquery/jquery.mousewheel.js"></script>
	<script src="js/prettify/prettify.js"></script>

	<!-- Metro UI CSS JavaScript plugins -->
	<script src="js/metro/metro-loader.js"></script>

	<!-- Local JavaScript -->
	<script src="js/docs.js"></script>
	<script src="js/github.info.js"></script>
	<script src="js/start-screen.js"></script>
        <script src="js/redirecciones.js"></script>
<!--<LINK href="EstilosTelefonico.css" rel="stylesheet" type="text/css"/>-->
</head>

<body class="metro container">  
<!--    <nav class="horizontal-menu">
        <ul>
            <li><a href="#">ABM Personal</a></li>
        </ul>
    </nav>  -->
    <div class="tile-area">    
        <div class="tile-group ten">
            
                
            <a href="./abmpersonas.php"><img src="./imagenes/logo.png" title="ABM de Personal" style="height: 80%; width: 10%; display: inline; align-content: left;padding-top: 5px;"/></a>
        
                <div align="center" class="col-xs-3" style="display: inline; align-items: center "> 
                    <span class="header fg-blue" style="padding-left:  230px; padding-bottom: 10px;vertical-align: middle;">Indice Telef&oacute;nico</span>
                </div>
<!--                <div class="on-right">
                     <a href="./abmpersonas.php" style="display: inline;vertical-align: bottom;">ABM Personas</a>
                </div>-->

           


                <div class="row">
                                <button  name="btnBuscar" class="tile six bg-gray bg-hover-blue" title="Buscar" onclick="redirigirBuscar();" href="#" target="_blank" data-click="transform">			
                                               
                                               <img src="./imagenes/b_search.png" />
                                                    <div class="tile-status">
                                                        <span class="name">Buscar</span>
                                                    </div>
                                </button> 
                </div>
		<div class="row">
                    <button  class="tile quadro bg-gray bg-hover-blue" title="Intervencion" onclick="redirigirInt();" href="#" target="_blank" data-click="transform">			
				        <!--<img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/>-->
                        <span class="name fg-white">Intervenci&oacute;n</span>
<!--					<div class="tile-status">
                                            
					</div>-->
                    </button> 
                    <button  class="tile double bg-gray bg-hover-blue" title="Secretaria General" onclick="redirigirSecGen();" href="#" target="_blank" data-click="transform">			
				       <!-- <img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/> -->
                                           <span class="name fg-white">Secretar&iacute;a <br/> General</span>		
<!--					<div class="tile-status">
                                            
					</div>-->
                    </button> 
                    <button  class="tile double bg-gray bg-hover-blue" title="Gerencia General" onclick="redirigirGG();" href="#" target="_blank" data-click="transform">			
				    
                        <span class="name fg-white">Gerencia <br/> General</span>		
<!--					<div class="tile-status">
						
					</div>-->
                    </button> 
                    
                    <button  class="tile  bg-gray bg-hover-blue" title="UCT" onclick="redirigirUCT();" href="#" target="_blank" data-click="transform">			
				        <!--<img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/>-->
                                        <span class="name fg-white">U.C.T</span>   		
<!--					<div class="tile-status">
						
					</div>-->
                    </button> 
                    <button  class="tile double bg-gray bg-hover-blue" title="Gerencia Comercial" onclick="redirigirGC();" href="#" target="_blank" data-click="transform">			
				        <!--<img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/>-->
                        <span class="name fg-white">Gerencia <br/> Comercial</span>   		
<!--					<div class="tile-status">
						
					</div>-->
                    </button> 
                </div>
            <div class="row">
                    <button  class="tile double bg-gray bg-hover-blue" title="Gerencia de Abastecimiento" onclick="redirigirGAb();" href="#" target="_blank" data-click="transform">			
				       <!-- <img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/> -->
                                         <span class="name fg-white">Gerencia de <br/> Abastecimiento</span>  		
<!--					<div class="tile-status">
                                            
					</div>-->
                    </button> 
                    <button  class="tile double bg-gray bg-hover-blue" title="Asesoria Juridica" onclick="redirigirAJ();" href="#" target="_blank" data-click="transform">			
<!--				        <img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/>-->
                        <span class="name fg-white" >Asesoria <br/> Juridica</span>   		
<!--					<div class="tile-status">
						
					</div>-->
                    </button> 
                    <button  class="tile double bg-gray bg-hover-blue" title="Gerencia de RRHH" onclick="redirigirGRH();" href="#" target="_blank" data-click="transform">			
<!--				        <img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/>-->
                                        <span class="name fg-white">Gerencia RRHH</span>   		
<!--					<div class="tile-status">
						
					</div>-->
                    </button> 
                
                    <button  class="tile double bg-gray bg-hover-blue" title="Gerencia de Seguridad" onclick="redirigirGSeg();" href="#" target="_blank" data-click="transform">			
				       <!-- <img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/> -->
                                           		<span class="name fg-white">Gerencia de <br/> Seguridad</span>
<!--					<div class="tile-status">
                                            
					</div>-->
                    </button> 
                    <button  class="tile double bg-gray bg-hover-blue" title="Gerencia de Sistemas" onclick="redirigirGSis();" href="#" target="_blank" data-click="transform">			
<!--				        <img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/>-->
                        <span class="name fg-white">Gerencia de <br/> Organizaci&oacute;n y Sistemas</span>   		
<!--					<div class="tile-status">
						
					</div>-->
                    </button> 
                    <button  class="tile double bg-gray bg-hover-blue" title="Gerencia de Operaciones" onclick="redirigirGOp();" href="#" target="_blank" data-click="transform">			
<!--				        <img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/>-->
                                        <span class="name fg-white">Gerencia de <br/> Operaciones</span>   		
<!--					<div class="tile-status">
						
					</div>-->
                    </button> 
                </div>
            <div class="row">
                    <button  class="tile double bg-gray bg-hover-blue" title="Gerencia de Ingenieria" onclick="redirigirGIng();" href="#" target="_blank" data-click="transform">			
				       <!-- <img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/> -->
                                        <span class="name fg-white">Gerencia de <br/> Ingenieria</span>   		
<!--					<div class="tile-status">
                                            
					</div>-->
                    </button> 
                    <button  class="tile double bg-gray bg-hover-blue" title="Gerencia Administrativa" onclick="redirigirGA();" href="#" target="_blank" data-click="transform">			
<!--				        <img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/>-->
                                        <span class="name fg-white">Gerencia <br/> Administrativa</span>   		
<!--					<div class="tile-status">
						
					</div>-->
                    </button> 
                    
                    <button  class="tile double bg-gray bg-hover-blue" title="Si.Ge.N" onclick="redirigirSigen();" href="#" target="_blank" data-click="transform">			
<!--				        <img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/>-->
                                        <span class="name fg-white">Si.Ge.N</span>   		
<!--					<div class="tile-status">
						
					</div>-->
                    </button> 
                    <button  class="tile quadro bg-gray bg-hover-blue" title="Internos remotos" onclick="redirigirIntR();" href="#" target="_blank" data-click="transform">			
				       <!-- <img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/> -->
                        <span class="name fg-white">Internos <br/>remotos</span>   		
<!--					<div class="tile-status">
                                            
					</div>-->
                    </button> 
                    <button  class="tile double bg-gray bg-hover-blue" title="Comite de Transferencia" onclick="redirigirComT();" href="#" target="_blank" data-click="transform">			
<!--				        <img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/>-->
                                        <span class="name fg-white">Comite de Transferencia</span>   		
<!--					<div class="tile-status">
						
					</div>-->
                    </button> 
                    <button  class="tile double bg-gray bg-hover-blue" title="Auditoria Interna " onclick="redirigirUAI();" href="#" target="_blank" data-click="transform">			
				        <!--<img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/>-->
                        <span class="name fg-white">Auditoria <br/> Interna</span>	
<!--					<div class="tile-status">
						
					</div>-->
                    </button> 
                    <button  class="tile double bg-gray bg-hover-blue" title="Relacioines Institucionales" onclick="redirigirRI();" href="#" target="_blank" data-click="transform">			
				       <!-- <img src="./img/iconos/Comoficiales.png" style="height: 118px; width: 160px; "/> -->
                                        <span class="name fg-white">Relaciones <br/> Institucionales</span>   		
<!--					<div class="tile-status">
                                            
					</div>-->
                    </button> 
            </div>


    </div>

    </div>

</body>
</html>
