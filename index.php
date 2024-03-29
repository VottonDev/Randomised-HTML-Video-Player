<?php
require_once('sql-connector.php');

// Fetch a random video from the database
if (!$res = $mysqli->query("SELECT * FROM videos ORDER BY RAND() LIMIT 1")) {
    echo "Failed to query database: (" . $mysqli->errno . ") " . $mysqli->error;
}

$video = $res->fetch_assoc();
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

	<div class="center"><a href='#'>
			<!-- Text redirects to link -->
			<span id="h1">
				<h1>Text here-</h1> <!-- Text shown in the right corner -->
			</span>
		</a></div>

	<video
		id="video"
		src="<?php echo $webm_path . $video->file; ?>" autoplay loop>
		<p>Your browser doesn't support the video tag.</p>
	</video>

	<body bgcolor="#000000" text="white" onLoad="JSFX_StartEffects()">
		<span id="h1"></a></span>

	</body>

</html>
