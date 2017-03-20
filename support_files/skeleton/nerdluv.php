<!DOCTYPE html>
<html>
	<!--
	CSE 190 M Homework 4 (NerdLuv) skeleton
	You should modify this file as necessary to implement your assignment.
	Specifically you'll have to add two HTML forms and modify the controls
	to make them submit their data as query parameters.
	-->

	<head>
		<title>NerdLuv.com</title>
		<link rel="shortcut icon" href="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/heart.gif" type="image/gif" />
		<link rel="stylesheet" href="nerdluv.css" type="text/css" />
	</head>

	<body>
		<div id="main">
			<div id="bannerarea">
				<img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/nerdluv.png" alt="banner logo" /> <br />
				where meek geeks meet
			</div>

			<div>
				Name: <br />
				<input type="text" size="16" />
			</div>

			<div>
				<!-- View Matches button -->
			</div>


			<div>
				Name: <br />
				<input type="text" size="16" />
			</div>

			<div>
				Age: <br />
				<input type="text" size="5" />
			</div>

			<div>
				Gender: <br />
				<label><input type="radio" /> Male</label>
				<label><input type="radio" checked="checked" /> Female</label>
			</div>

			<div>
				Keirsey personality type
				(<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a>): <br />
				<input type="text" size="5" maxlength="4" />
			</div>

			<div>
				Favorite operating system: <br />
				<select>
					<option>Windows</option>
					<option>Mac OS X</option>
					<option>Linux</option>
					<option>other</option>
				</select>
			</div>

<!--
CSE majors should uncomment the section below
to implement the file upload feature
-->

<!--
			<div>
				Photo (optional): <br />
				<input type="file" size="40" />
			</div>
-->

			<div>
				Seeking: <br />
				<label><input type="checkbox" checked="checked" /> Male</label>
				<label><input type="checkbox" /> Female</label>
			</div>

			<div>
				Between the ages of: <br />
				<input type="text" size="5" maxlength="2" /> and
				<input type="text" size="5" maxlength="2" />
			</div>

			<div>
				<!-- Sign Up button -->
			</div>
		
		</div>

		<div id="w3c">
			<a href="http://validator.w3.org/check/referer"><img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/w3c-html.png" alt="Valid HTML" /></a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/w3c-css.png" alt="Valid CSS" /></a>
		</div>
	</body>
</html>
