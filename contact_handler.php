

<?php

// not a secure form, but because mjs.design is noindexed (I direct-submit to employers) I don't expect a lot of bad traffic, he said, on the    night before all the bad traffic arrived

// $mjs_email holds the domain email, and $error_holder holds form errors

$mjs_email = "mjs@mjs.design";
$error_holder = "";

// boolean checks for null fields; if null, a descriptive error message is added to $error_holder

if(empty($_POST["from_name"]) || empty($_POST["from_email"]) || empty($_POST["from_message"])) {
	$error_holder .= "\n ERROR: You must fill out each field (name, email, message) to continue.";
}

$from_name = $_POST["from_name"];
$from_email = $_POST["from_email"];
$from_message = $_POST["from_message"];

// boolean checks for bad email format with regex; if bad, a descriptive error message is added to $error_holder

if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $from_email)) {
	$error_holder .= "\n ERROR: Your email address was invalid.";
}

// boolean checks for no errors; if none, sends mail on to me

if(empty($error_holder)) {
	$send_to = $mjs_email;
	$from_subject = "SUBMISSION FROM: $from_name";
	$from_content = "Here is your message, Mr. Smith: ".
	"\n FROM: $from_name \n @: $from_email \n MESSAGE: $from_message";
	$head = $mjs_email;

	mail($send_to, $from_subject, $from_content, $head);
	
	header("LOCATION: thanksalot.html");
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- Dear Smart-Human-Who-Looks-at-Website-Source-Code: you should look at this project's code on GitHub instead (https://github.com/polymatt/mjs.design). -->

<head>
    <title>Matthew J. Smith, UX Designer | Contact: Errors</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="_/css/style.css">
    <script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <div class="grid">
        <header class="grid__col--3 header panel--centered" role="banner">
            <a class="site-logo" href="index.html">
                <h1 class="headline-primary--grouped">Matthew J. Smith</h1>
                <h1 class="headline-primary--grouped"><span class="red">UX Designer</span></h1>
                <h1 class="headline-primary">Toronto</h1>
            </a>
            <nav class="navbar" role="navigation">
                <ul class="nav">
                    <li class="nav__item"><a href="index.html">PORTFOLIO</a></li>
                    <li class="nav__item"><a href="about.html">ABOUT</a></li>
                    <li class="nav__item"><a href="contact.html">CONTACT</a></li>
                </ul>
            </nav>
        </header>
        <p class="fake-draft-text is-hidden-mobile" data-tip="A functionless - but fun, maybe? - fake draft text.">mjs.design draft &#35;2<span id="date"></span></p>
        <div id="portfolio-expanded" class="grid__col--9 panel--centered">
            <img class="portfolio-img grid__col--4 header-img" src="img/portfolio/CONT_SadError.png" alt="A sad face.">
            <h1>Contact: Error...</h1>
            <p>
                Your contact form submission failed, friend, for these reasons:
            </p>
            <?php
            // $error_holder errors are shown to the user here
echo nl2br($error_holder);
?>
                <br />
                <br />
                <br />
                <p>
                    Please don't hesitate to <a href="contact.html">contact me again!</a>
                    <br />Or: if you'd rather not retry the contact form, I can also be reached via email at <a href="mailto:mjs@mjs.design">mjs@mjs.design</a>.
                </p>
                <br />
        </div>
		<footer class="grid__col--9 panel--centered" role="contentinfo">
			<div id="social-media">
				<p>Follow me everywhere:</p>
				<ul>
					<li>
						<a href="https://github.com/polymatt">
							<p>GitHub</p>
						</a>
					</li>
					<li>
						<a href="https://www.behance.net/polymatt">
							<p>Behance</p>
						</a>
					</li>
					<li>
						<a href="https://twitter.com/polymatt">
							<p>Twitter</p>
						</a>
					</li>
					<li>
						<a href="https://ca.linkedin.com/in/matthew-smith-833115b6">
							<p>LinkedIn</p>
						</a>
					</li>
				</ul>
			</div>
			<p>Designs and Code by Matthew J. Smith &copy; 2016</p>
			<p>Written in <span class="italic">Vim</span> and <span class="italic">Brackets</span></p>
	</div>
	</footer>
	</div>
	<script src="_/js/script.js"></script>
</body>

</html>