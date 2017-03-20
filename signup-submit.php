<?php include("top.html"); ?>
<?php

/* Set default values for all variables the page needs. */
$errors = array();
$user = array(
    'name' => '',
    'gender' => '',
    'age' => '',
    'personality_type' => '',
    'favorite_os' => '',
    'min_seeking_age' => '',
    'max_seeking_age' => ''
);

/* Confirm that values are present before accessing them. */
if(isset($_POST['name'])) {
    $user['name'] = urlencode($_POST['name']);
}
if(isset($_POST['gender'])) {
    $user['gender'] = urlencode($_POST['gender']);
}
if(isset($_POST['age'])) {
    $user['age'] = urlencode($_POST['age']);
}
if(isset($_POST['personality_type'])) {
    $user['personality_type'] = ($_POST['personality_type']);
}
if(isset($_POST['os'])) {
    $user['favorite_os'] = ($_POST['os']);
}
if(isset($_POST['min_seeking_age'])){
    $user['min_seeking_age'] = ($_POST['min_seeking_age']);
}
if(isset($_POST['max_seeking_age'])){
    $user['max_seeking_age'] = ($_POST['max_seeking_age']);
}

/* check: names cannot be digits */
if (preg_match("/[0-9]/", $_POST["name"]) === 1) {
    $errors[] = "Name cannot be digits";

}

/* alphabetic letters with the first letter of each world capitalized. */
$words = explode(" ", $user["name"]);
for ($i = 0; $i < count($words); $i++) {
    if(strcmp(ucfirst($words[$i]),$words[$i]) !== 0) {
        $errors[] = "Name must be capitalized";
        break;
    }
}

/*validate age */
if (!is_numeric($user["age"])) {
    $errors[] = "Age is not a number.";
}

//validate personality type
$personality = array("ESTJ", "ISTJ", "ENTJ", "INTJ",
    "ESTP", "ISTP", "ENTP", "INTP",
    "ESFJ", "ISFJ", "ENFJ", "INFJ",
    "ESFP", "ISFP", "ENFP", "INFP"
);
if (!in_array($user["personality_type"], $personality)) {
    $errors[] = "Invalid Personality type";
}

// validate min/max seeking age.
if (!is_numeric($_POST["min_seeking_age"])) {
    $errors[] = "Min seeking age is not a number.";
}

if (!is_numeric($_POST["max_seeking_age"])) {
    $errors[] = "Max seeking age is not a number.";
}
/* Write to singles.txt after validation. */
if (empty($errors)) {
    //parse form details into a one line
    $user_details = $user;
    $to_write = implode(",", $user_details);
    file_put_contents("singles.txt", PHP_EOL.$to_write, FILE_APPEND);
?>
    <pre>
        Thank you
        Welcome to NerdLuv, <?= $user["name"] ?>!
        Now <a href="matches.php">log in to see your matches!</a>
    </pre>
<?php
}
else {
?>
    <div class="errors">
        Please fix the following errors:
        <ul>
<?php
    foreach ($errors as $error) {
?>
            <li><?= $error ?> </li>
    <?php } ?>
        </ul>
    </div>
<?php
}
?>
<?php include("bottom.html"); ?>
