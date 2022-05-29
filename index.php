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

	<?php
		$files = scandir('files');
		$num_files = count($files);
		?>
	<title><?php echo $num_files ?> webms</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="styles/main.css">

	<script type="text/javascript">
		function getColor(start, end, percent) {
			function hex2dec(hex) {
				return (parseInt(hex, 16));
			}

			function dec2hex(dec) {
				return (dec < 16 ? "0" : "") + dec.toString(16);
			}

			const r1 = hex2dec(start.slice(0, 2)),
				g1 = hex2dec(start.slice(2, 4)),
				b1 = hex2dec(start.slice(4, 6));
			const r2 = hex2dec(end.slice(0, 2)),
				g2 = hex2dec(end.slice(2, 4)),
				b2 = hex2dec(end.slice(4, 6));
			const pc = percent / 100;
			const r = Math.floor(r1 + (pc * (r2 - r1)) + .5),
				g = Math.floor(g1 + (pc * (g2 - g1)) + .5),
				b = Math.floor(b1 + (pc * (b2 - b1)) + .5);
			return ("#" + dec2hex(r) + dec2hex(g) + dec2hex(b));
		}
	</script>

	<script>
		const colors = ["339966", "FF0000", "00FF00", "0000FF", "FFFF00", "FF00FF", "00FFFF"];
		let start = colors[0];
		let end = colors[0];
		let index = 0;
		let cindex = 0;
		const faderObj = [];

		function fadeSpan() {
			if (index === 0) {
				start = end;
				end = colors[cindex = (cindex + 1) % colors.length];
			}

			for (let i = 0; i < faderObj.length; i++)
				faderObj[i].style.color = getColor(start, end, index);

			index = (index + 5) % 100;

			setTimeout("fadeSpan()", 40);
		}

		function fadeAll() {
			for (let i = 0; i < arguments.length; i++)
				faderObj[i] = document.getElementById(arguments[i]);

			fadeSpan();
		}

		function JSFX_StartEffects() {
			fadeAll("h1", "h2", "h3");
		}
	</script>
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