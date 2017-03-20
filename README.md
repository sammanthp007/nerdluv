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
- [ ]You must write the HTML for the form. The form has one field:
 Name: A label and 16-letter box for the user to type a name.
Initially empty. 
- [ ] Submit to the server as a query parameter name.
- [ ] When the user presses "View My Matches," the form submits its
data as a GET request to matches-submit.php. 
- [ ] The name of the query parameter sent should be name, and its value should be the encoded text typed by the user.
For example, when the user views matches for Rosie O Donnell, the URL should be:
 matches-submit.php?name=Rosie+O+Donnell
