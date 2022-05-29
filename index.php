<?php
require_once('config.php');

$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$res = $mysqli->query("SELECT FLOOR(RAND() * COUNT(*)) AS `offset` FROM `videos` ")) {
  echo "Failed to retrieve offset: " . $mysqli->error;
}

$offset_row = $res->fetch_object();
$offset = $offset_row->offset;

if (!$res = $mysqli->query("SELECT * FROM `videos` LIMIT $offset, 1")) {
  echo "Failed to retrieve video: " . $mysqli->error;
}

$video = $res->fetch_object();
$mysqli->close();

if (!$video) {
  echo "No videos found.";
}

?>

<html lang=en>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		$files = scandir('files');
		$num_files = count($files);
		?>
	<title><?php echo $num_files ?> webms</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="styles/main.css">
	<script src="js/main.js"></script>
</head>

<body bgcolor="#000000" text="white" onLoad="JSFX_StartEffects()" onClick="location.reload()">

	<center><a href='http://steamcommunity.com/groups/Pomfe'>
			<!-- Text redirects to link -->
			<span id="h1">
				<h1>Pomfe-</h1> <!-- Text shown in the right corner -->
			</span>
		</a></center>

	<video
		style="position: fixed; top: 50%; left: 50%; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: -100; -webkit-transform: translateX(-50%) translateY(-50%); transform: translateX(-50%) translateY(-50%); background: no-repeat; background-size: cover; "
		src="<?php echo $webm_path . $video->file; ?>" autoplay loop>
		<p>Your browser doesn't support the video tag.</p>
	</video>

	<body bgcolor="#000000" text="white" onLoad="JSFX_StartEffects()">
		<span id="h1"></a></span>

	</body>

</html>