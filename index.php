<?php
$title='Cuenta';
include('head.php');
?>

 <div data-role="header">
        <h1><?php echo $title;?></h1>
    </div><!//-- /header //-->

    <div role="main" class="ui-content jqm-content">
	
	<form name="proceso" action="" method="post">
       <!-- <p>Seleccionar:<select name="proceso">
							<option value="">Seleccionar una opción</option>
							<option value="CTS_CARGA_ARCHIVO">Cargar de archivo</option>
							<option value="CTS_CREATE_SINGLE_INVOICE_F">Crear factura</option>
							<option value="CTS_CREATE_AND_APPLY_FN">Crear y aplicar</option> 
					   </select>
		
		</p> -->
		<p>Salón:<select name="salon" id="salon"  >
					<option value="El caudal">El caudal</option>
					<option value="Las fuentes">Las Fuentes</option>
				 </select></p>
		<p>Fotos de montaje:<input type="number" name="fm" id="fm"  placeholder="10" value="10" ></p>
		<p>Fotos impresas:<input type="number" name="fi" id="fi"  ></p>
		<p>Fotos de sobrantes:<input type="number" name="fs" id="fs" ></p>
		<p>Monto de rebajas:<input type="number" name="mr" id="mr" ></p>
		<p>Comisión:<input type="number" name="co" id="co" ></p>
		<p>Taxis:<input type="number" name="tx" id="tx" ></p>
		
		
	<!-- <button type="submit">Calcular</button> -->
		<input type="submit" name="submit" id="submit" value="Calcular" onclick="getFocus()">
	</form>
	

<?php
if (isset($_POST['submit'])) {
	// echo 'entro...';
	
	$salon = $_POST['salon']; 
	$fm = $_POST['fm']; 
	$fi = $_POST['fi']; 
	$fs = $_POST['fs']; 
	$co = $_POST['co']; 
	$tx = $_POST['tx']; 
	$mr = $_POST['mr']; 
	$td = $_POST['td']; 
	$imp = 5;
	$folder = 2.50;
	$c_foto=50; //costo de foto con folder vendida
	$gente= 0.30;
	
	$fo_no_vendidas=$fm + $fs;
	//operacion de fotos
	$fo_vendidas= $fi - $fo_no_vendidas; //total de fotos vendidas menos montaje y sobrantes
	$total1 =($fo_vendidas * $c_foto) - $mr; // costo de fotos vendidas menos rebajas
	
	
	//operacion de gastos
	$total_folder = $fo_vendidas * $folder;
	$impresiones  = $fi * $imp;
	$total_g      = $co + $tx + $impresiones + $total_folder ;
	
	$tota_pagar= ($total1 - $total_g) * $gente;
	
	
	echo'
	
	<script language="javascript">
	 $(window).ready(function(){
            $("body").animate({ scrollTop: $(document).height()}, 1000);    
        });  
	</script> 
	
	<br>
		 <h2>Resumen:</h2>';
		 
		 
	echo '
	<div style="width:400px;float:left;">
	<p><<<<<<<<<<<<<<<<< '.$salon.' >>>>>>>>>>>>>>>></p>
	 <p>++++++++++++++++ Fotos  ++++++++++++++++++++</p>              
	 <div id="" style="width:200px;float:left;">Fotografias no vendidas		</div>= - '.$fs.' 
	 <br><div style="width:200px;float:left;">Fotografias de montaje    </div>= - '.$fm.' 
	 <br><div style="width:200px;float:left;">Fotografias vendidas      </div>= '.$fo_vendidas.'
	 <p>++++++++++++++++ Gastos ++++++++++++++++++++</p>
	 <div style="width:200px;float:left;">Monto de Rebajas              </div>- $ '.$mr.'  
	 <br><div style="width:200px;float:left;">Comisión:                 </div>- $ '.$co.'
	 <br><div style="width:200px;float:left;">Taxis                     </div>- $ '.$tx.'
	 <br><div style="width:200px;float:left;">Costo de impresion        </div>- $ '.$impresiones.'
	 <br><div style="width:200px;float:left;">Costo de folders          </div>- $ '.$total_folder.'
	 <p>++++++++++++++++ Totales +++++++++++++++++++</p>
	 <div style="width:200px;float:left;">Costo de fotos vendidas       </div>= $ '.$total1.'
	 <br><div style="width:200px;float:left;">Total de gastos   		</div>- $ '.$total_g.'
	 <br><div style="width:200px;float:left;">Total por trabajador 		</div>= $ '.$tota_pagar.' 
	 </div>
	';
	
}
//echo 'nada...';
?>






<?php
include('footer.php');
?>