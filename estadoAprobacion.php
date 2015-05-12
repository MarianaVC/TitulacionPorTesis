<?php 
$estadoSRO;

function aprobacion(){
	global $estadoSRO;

	$estadoSRO = "En proceso de aprobacion";
}
?>
<p>
<?php echo $estadoSRO;?>
</p>
