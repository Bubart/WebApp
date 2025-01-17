<html>
<?php
	require('header.php');
	if(!isset($_GET['id'])){
		exit("ERROR");
	}
	// 1 - dust 2
	// 2 - inferno
	// 3 - mirage
	$directory = "img/";
	switch($_GET['id']){
		case 1:
			$bg = "dust_2_edit.jpg";
			$inmap = "dust_2r.jpg";
			$maptitle = "DUST 2";
		break;
		case 2:
			$bg = "inferno_edit.jpg";
			$inmap = "infernor.jpg";
			$maptitle = "INFERNO";
		break;
		case 3:
			$bg = "mirage_edit.jpg";
			$inmap = "mirager.jpg";
			$maptitle = "MIRAGE";
		break;
		default:
			$maptitle = "";
		break;
	}
?>
<script src='js/map.js'></script>
<script>
	var id = <?php echo $_GET['id']; ?>;
	var smokes = [];
	var flashes = [];
	
	<?php
	require('conn.php');
	
	$sql = "SELECT * FROM points";
	$result = mysqli_query($conn,$sql);
	$smokectr = 0;
	$flashesctr = 0;
	for($i=0; $row = mysqli_fetch_assoc($result); $i++){
		if(strcmp($row['type'], "smokes") == 0 && $_GET['id'] == $row['Map_id']){
			echo "smokes[".$smokectr."] = {x: ".$row['x'].", y: ".$row['y'].","
			."t_x: ".$row['t_x'].", t_y: ".$row['t_y'].", duration: ".$row['duration'].", map_id: ".$row['Map_id']."};";
			$smokectr++;
		}else if(strcmp($row['type'], 'flashes') == 0 && $_GET['id'] == $row['Map_id']){
			echo "flashes[".$flashesctr."] = {x: ".$row['x'].", y: ".$row['y'].","
			."t_x: ".$row['t_x'].", t_y: ".$row['t_y'].", duration: ".$row['duration'].", map_id: ".$row['Map_id']."};";
			$flashesctr++;
		}
	}
	?>
</script>
<style>
	body{
		background-image: url(<?php echo $directory.$bg; ?>) !important;
	}.inmap{
		background-image: url(<?php echo $directory.$inmap; ?>);
	}
</style>
<body>
	<?php
		require('headerbar.php');
	?>
	<div class='row contentbody'>
		<div class='col-md-12'>
			<div class='row'>
				<div class='col-md-10 col-md-offset-1'>
					<div class='row text-center'>
						<span class='h1 title'><?php echo $maptitle; ?></span>
					</div>
					<div class='row inmap'>
						<div class='col-md-2 optionsbar'>
							<div class='row'>
								<div class='col-md-10  col-md-offset-1'>
									<div class='form-group row'>
										<select class='form-control'>
											<option class='type'>Smokes</option>
											<option class='type'>Flashes</option>

										</select>
									</div>
									<div class='form-check row'>
										<div class='col-md-1'>
											<input class='form-check-input' type='checkbox' value='' id='showvid' checked = 'false'>
										</div>
										<div class='col-md-7'>
											<span class='h5'>Show Video</span>
										</div>
									</div>
									<div class='form-check row'>
										<div class='col-md-1'>
											<input class='form-check-input' type='checkbox' id='showtarget' value='' checked = 'true'>
										</div>
										<div class='col-md-7'>
											<span class='h5'>Show Target Point</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class='col-md-10'>
							<div class='col-md-9 mapprop'>
								<div class='point smokes' id='p8'></div>
								<div class='target smokes' id='t8'>
									<span class='glyphicon glyphicon-remove'></span>
								</div>
							</div>
							<div class='vid'>
								<span class='h6 cap'>Hover on a point to display Video</span>
								<img src='' class='gifanim'>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class='arrow prev'><button class='mapnav'><span class='glyphicon glyphicon-chevron-left'></button></div>
	<div class='arrow next'><button class='mapnav'><span class='glyphicon glyphicon-chevron-right'></button></div>
	<?php require('footer.php'); ?>
	</div>
</body>
</html>