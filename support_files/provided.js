/*
CSE 190, Homework 4 (NerdLuv)
This script is to help the TAs grade HW4 by auto-filling out the student's form.
Students don't need to examine or modify it.
*/

(function() {
	parseQueryParams();
	
	// fix param names, e.g. __name -> name
	for (var key in $_REQUEST) {
		if (key.match(/^__/)) {
			var newkey = key.replace(/^__/, "");
			$_REQUEST[newkey] = $_REQUEST[key];
		}
	}

	if (window.addEventListener) {
		window.addEventListener("load", windowLoad, false);
	}

	function windowLoad() {
		if (typeof($_REQUEST["grading"]) === "undefined" || $_REQUEST["grading"] === "0" || $_REQUEST["grading"] === "false") {
			return;
		}
		populateForm();
		geluso_main();
	}
	
	function populateForm() {
		// abort if not grading (if we haven't passed >= 8 special query params)
		var requiredParams = ["name", "age", "ptype", "min", "max", "gender", "os"];
		for (var i = 0; i < requiredParams.length; i++) {
			if (typeof($_REQUEST[requiredParams[i]]) === "undefined") {
				return;
			}
		}
		
		var textboxes = $$("input[type='text']");
		
		// patch: also grab inputs with no type  (no type -> type=text)
		var allInputs = $$("input");
		for (var i = 0; i < allInputs.length; i++) {
			if (!allInputs[i].type || (allInputs[i].type == "text"
					&& textboxes.indexOf(allInputs[i]) < 0)) {
				textboxes.push(allInputs[i]);
			}
		}
		
		if (textboxes.length >= 5) {
			textboxes[0].value = $_REQUEST["name"];
			textboxes[1].value = $_REQUEST["age"];
			//You shouldn't need to change for anyone.
			//Just be yourself.
			textboxes[2].value = $_REQUEST["ptype"];
			textboxes[3].value = $_REQUEST["min"];
			textboxes[4].value = $_REQUEST["max"];
		}
		
		//If only sex changes were this easy
		var radioButtons = $$("input[type='radio']");
		if (radioButtons.length >= 2) {
			radioButtons[0].checked = $_REQUEST["gender"] == "M";
			radioButtons[1].checked = $_REQUEST["gender"] == "F";
		}
		
		var options = $$("option");
		if (options.length >= 3) {
			for (var i = 0; i < options.length; i++) {
				options[i].selected = $_REQUEST["os"] == options[i].innerHTML.strip();
			}
		}
		
		var checkboxes = $$("input[type='checkbox']");
		if (checkboxes.length >= 2) {
			checkboxes[0].checked = $_REQUEST["seeking"].match(/M/);
			checkboxes[1].checked = $_REQUEST["seeking"].match(/F/);
		}
	}

	// returns the page's query string as a hash.
	// Also sets up a global hash named $_REQUEST.
	// $_REQUEST["name"] -> value of 'name' query param
	function parseQueryParams() {
		if (!window.location.search || window.location.search.length < 1) {
			return {};
		}
		
		var url = window.location.search.substring(1);
		var chunks = url.split(/&/);
		var hash = {};
		for (var i = 0; i < chunks.length; i++) {
			var keyValue = chunks[i].split(/=/);
			if (keyValue[0] && keyValue[1]) {
				var thisValue = unescape(keyValue[1]);
				thisValue = thisValue.replace(/[+]/g, " ");  // unescape URL spaces
				hash[keyValue[0]] = thisValue;
			}
		}
		$_REQUEST = hash;   // PHP-like global var name
		return hash;
	}


	/* BEGIN STEVE GELUSO GRADING TESTS SCRIPT */
	var REGULAR = [];
	var EXTRA = [];
	var SUITE = REGULAR;

	REGULAR["Bjarne Stroustroup"] = ["Leia Organa", "Mary Lou Jepsen", "Roberta Williams", "Sarah Connor"];
	EXTRA["Bjarne Stroustroup"] = ["Leia Organa", "Mary Lou Jepsen", "Roberta Williams", "Sarah Connor"];

	REGULAR["Lara Croft"] = ["Anakin Skywalker", "Nostalgia Critic"];
	EXTRA["Lara Croft"] = ["Anakin Skywalker", "Leeloo", "Nostalgia Critic", "River Tam"];

	REGULAR["Leeloo"] = ["Anakin Skywalker","Edsger Dijkstra","James Gosling","Nostalgia Critic","Rasmus Lerdorf"];
	EXTRA["Leeloo"] = ["Anakin Skywalker","Edsger Dijkstra","James Gosling","Lara Croft","Nostalgia Critic","Rasmus Lerdorf","River Tam"];

	REGULAR["Nostalgia Critic"] = ["Ellen Ripley", "Lara Croft", "Leeloo", "Marissa Mayer"];
	EXTRA["Nostalgia Critic"] = ["Anakin Skywalker", "Lara Croft", "Leeloo", "Marissa Mayer", "Rasmus Lerdorf"];

	REGULAR["Stewie Griffin"] = [];
	EXTRA["Stewie Griffin"] = ["Angry Video Game Nerd"];

	REGULAR["Stephen Colbert"] = ["Barbara Liskov","Dana Scully","Deanna Troi"];
	EXTRA["Stephen Colbert"] = ["Alan Turing","Barbara Liskov","Dana Scully","Deanna Troi","Vint Cerf"];

	REGULAR["Kate Austen"] = ["Anakin Skywalker","Marty Stepp","Nostalgia Critic","Rasmus Lerdorf"]; 
	EXTRA["Kate Austen"] = ["Anakin Skywalker","Lara Croft","Marty Stepp","Nostalgia Critic","Rasmus Lerdorf"]; 

	// Adds the result of a test to the table of test results. 
	// Results are highlighted in green if the actual result matches
	// the given expected result.
	function add_row(test_name, expected, actual, th) {
		var result = expected === actual;
		var celltag = th ? th : "td";

		// Create a row and color it depending on the result of the comparison.
		var row = document.createElement("tr");
		row.style.color = result ? "green" : "red";

		var test_name_cell = document.createElement(celltag);
		test_name_cell.textContent = test_name;
		row.appendChild(test_name_cell);
		
		var expected_cell = document.createElement(celltag);
		expected_cell.textContent = expected;
		row.appendChild(expected_cell);
		
		var actual_cell = document.createElement(celltag);
		actual_cell.textContent = actual;
		row.appendChild(actual_cell);

		document.getElementById("results").appendChild(row);
	}

	// Runs all ye tests.
	function run_tests() {
		clear_results();
		
		// Select which set of results to compare output to.
		SUITE = document.getElementById("regular").checked ? REGULAR : EXTRA;

		// Try to obtain the username.
		var page_text= document.body.textContent;
		var user = page_text.match("Matches for (.*)?\n")[1].trim();

		// Obtain the matches and compare
		// var matches = document.getElementsByClassName("match");
		var matches = $$(".match p");

		var expected_length = SUITE[user].length;
		var actual_length = matches.length;

		// Tests to see if the number of matches is correct.
		add_row("length", expected_length, actual_length);
		
		// Tests to see if the order of the matches is correct.
		for (var i = 0; i < Math.max(expected_length, actual_length); i++) {
			var expected_match = SUITE[user][i];
			var actual_match = matches[i];
			if (actual_match) {
				// actual_match = matches[i].getElementsByTagName("p")[0];
				// actual_match = actual_match.textContent.trim();
				actual_match = (actual_match.textContent || actual_match.innerText).trim();
			}
			add_row("match", expected_match, actual_match);
		}
	}

	// Remove all but the first row in the table of test results.
	// The first row contains the titles for each column.
	function clear_results() {
		var rows = document.getElementsByTagName("tr");
		var size = rows.length;
		for (var i = 0; i < size - 1; i++) {
			rows[1].remove();
		}
	}

	// Initializes the area where results are reported.
	function create_results() {
		var test_results = document.createElement("div");
		test_results.id = "tests";
		test_results.style.border = "1px solid gray";
		test_results.style.position = "fixed";
		test_results.style.top = "5px";
		test_results.style.right = "5px";
		test_results.style.width = "inherit";
		
		var regular_label = document.createElement("label");
		regular_label.innerHTML = "<input id='regular' type='radio' name='suite' value='regular' checked/>Regular output";
		regular_label.onclick = run_tests;
		
		var extra_label = document.createElement("label");
		extra_label.innerHTML = "<input type='radio' name='suite' value='extra' />Extra-credit output";
		extra_label.onclick = run_tests;

		test_results.appendChild(regular_label);
		test_results.appendChild(extra_label);
		//test_results.appendChild(select);
		
		var table = document.createElement("table");
		table.id = "results";
		table.border = "1";
		test_results.style.borderCollapse = "collapse";
		
		test_results.appendChild(table);
		document.body.appendChild(test_results);
		
		add_row("Test", "Expected", "Actual", "th");
		// Turnt the color back to black.
		document.getElementsByTagName("tr")[0].style.color = "black";
	}

	function geluso_main() {
		create_results();
		run_tests();
	}
})();




