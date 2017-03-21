## For signup page

- [x] Name: A 16-character box for the user to type a name. A
name should only have alphabetic letters with the first letter
of each world capitalized.
- [x] Gender: Radio buttons for the user to select a gender of Male
or Female. When the user clicks the text next to a radio button,
   that button should become checked. Initially Female is
   checked.
   - [x] Age: A 6-letter-wide text input box for the user to type his/her
   age in years. The box should allow typing up to 2 characters.
   The characters must be digits only.
   - [x] Personality type: A 6-character-wide text box allowing the
   user to type a Keirsey personality type, such as ISTJ or ENFP.
   The box should let the user type up to 4 characters. The label
   has a link to http://www.humanmetrics.com/cgi-win/JTypes2.asp .
   The input must be one of the 16 types.
   - [x] Favorite OS: A drop-down select box allowing the user to
   select a favorite operating system.
   The choices are Windows, Mac OS X, and Linux. Initially "Windows" is selected.
   - [x] Seeking age: Two 6-character-wide text boxes for the user to specify the range of acceptable ages of partners. The box should allow the user to type up to 2 characters in each box.
   Initially both are empty and have placeholder text of "min"
   and "max" respectively. When the user starts typing, this placeholder text disappears. The input must be digits only.
   - [x] Sign Up: When pressed, submits the form for processing as described below.

## For submit-signup.php
   - [x] When the user presses "Sign Up," the form should submit its data as a POST to signup-submit.php. 
   The exact names and values of the query parameter(s) are up to you.
   - [x] your PHP code should read the data from the query parameters and store it as described.
   - [x] The resulting page has the usual header and footer and text
   thanking the user.
   - [x] The text "log in to see your matches!" links to
   matches.php.
   - [x] Your site's user data is stored in a file singles.txt, placed in the same folder as your PHP files.
   We will provide you an initial version of this file.
   - [x] Your signup-submit.php code should create a line representing the new user's information and add it to the end of the file.
   See the PHP file_put_contents function in book Chapter 5 or the lecture slides.
   - [x] In all pages, validate data for form submissions. Make sure no field is left blank and all the input conforms to the required
   format.
   - [x] If there is an error, show the errors on the page by replacing the three lines of text starting at "Thank you!" in the
   example above. There is no need to check duplicate names.

## For matches.php
- [x] The matches.php page has a header logo, a form to log in and
view the user's matches, and footer notes/images. 
- [x] You must write the HTML for the form. The form has one field:
 Name: A label and 16-letter box for the user to type a name.
Initially empty. 
- [x] Submit to the server as a query parameter name.
- [x] When the user presses "View My Matches," the form submits its
data as a GET request to matches-submit.php. 
- [x] The name of the query parameter sent should be name, and its value should be the encoded text typed by the user.
For example, when the user views matches for Rosie O Donnell, the URL should be:
 matches-submit.php?name=Rosie+O+Donnell

## Viewing Matches (matches-submit.php):
- [x] When viewing matches for a given user, matches-submit.php
should show a central area displaying each match. 
- [x] Write PHP code that reads the name from the page's name query parameter and finds which other singles match the given user.
- [x] The existing singles to match against are records found in the file singles.txt as described previously.
You may assume that the name parameter is passed and will be found in the file.
- [x] Below the banner should be a heading of "Matches for (name)".
Below this is a list of singles that match the user. A "match" is a
person with all of the following qualities:
- [x] The opposite gender of the given user;
- [x]  Of compatible ages; that is, each person is between the
other's minimum and maximum ages, inclusive;
- [x]  Has the same favorite operating system as this user;
- [x]  Shares at least one personality type letter in common at the
same index in each string.
For example, ISTP and ESFP have 2 in common (S, P).
- [x] As you find each match, output the HTML to display the matches,
in the order they were originally found in the file. Each match has
the image user.jpg, the person's name, and an unordered list with
their gender, age, personality type, and OS.
If no match is found, display a message of "No match is found.".

## For grading
- [x] Your HTML output for all pages must pass the W3C HTML validator. (Not the PHP source code itself, but the HTML
output it generates.) Do not use HTML tables. Since we are using HTML forms, choose proper form controls and set their
attributes accordingly. Properly choose between GET and POST requests for sending data.
- [x] Your PHP code should not cause errors or warnings. Minimize use of the global keyword, use indentation/spacing, and
avoid lines over 100 characters. Use material from the first four weeks of class and the first six book chapters.
- [x] Some HTML sections are shared redundantly between your PHP pages, found in the provided files top.html and
bottom.html. Include these files as appropriate in your other pages using the PHP include function.
- [x] A major grading focus is redundancy. Use functions, parameters/return, included files/code, loops, variables, etc. to
avoid redundancy. If you have PHP code you want to share between multiple pages, you may turn in an optional file named
common.php containing this code. You can include your common.php in your other pages.
- [x] For full credit, reduce the amount of large chunks of PHP code in the middle of HTML code. Replace such chunks with
functions declared at the top or bottom of your file. You will also lose points if you use PHP print or echo statements. Insert
dynamic content into the page using PHP expression blocks, <?= ... ?> , as taught in class.
- [x] Another grading focus is PHP commenting. Put a descriptive comment header at the top of each file, each function, and
each section of PHP code.
- [x] Format your HTML and PHP code similarly to the examples from class. Properly use whitespace and indentation. Do not
place more than one block element on a line or begin a block element past the 100th character.
- [x] Part of your grade will also come from successfully uploading your files to the web. You should place your files into a
hosting server. Some are free, such as https://www.000webhost.com and https://x10hosting.com (use your gmail address to
sign up). Your page should be accessible from anywhere.
https://nerdluv.herokuapp.com/index.php
- [x] Submit your assignment online at http://www.networks.howard.edu/lij/courses/submit_hw.html. The following files should
be submitted after zipped into a single archive:
