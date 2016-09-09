<h1>Simple Webm Player.</h1>

<h1>What you need?</h1>
<ol>
<ul>nginx or apache2</ul>
<ul>PHP</ul>
<ul>MySQL Server</ul>

<h1>How to setup</h1>
<ol>
<ul>1.Throw files to your website's folder.</ul>
<ul>2.Import sql file to your mysql database.</ul>
<ul>3.Throw your webm files to your webm path.</ul>
<ul>4.Modify MySQL Video Table to your likings.</ul>
</ol>


<h1>How to add more webms:</h1>
INSERT INTO `videos` (`id`, `file`, `name`) VALUES
(1, 'filename.webm', '1');

<h1>Extra Info</h1>
You run that as query.
Remember to change the number always on the query when you insert a new video.

PS: Yes i know this looks very bad.
