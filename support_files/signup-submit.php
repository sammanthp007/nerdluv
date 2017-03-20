<?php include("top.html"); ?>
<?php
$has_error = FALSE;


if (preg_match("/[0-9]/", $_POST["name"]) === 1) {
    $has_error = TRUE;

}
// every unique word should start with upper case letter
$name_list = explode(" ", $_POST["name"]);
for ($i = 0; $i < count($name_list); $i++) {
    if(strcmp(ucfirst($name_list[$i]),$name_list[$i]) !== 0) {
        $has_error = TRUE;
        break;
    }
}

//validate age
if (!is_numeric($_POST["age"])) {
    echo "Age is not a number.";
    $has_error = TRUE;
}

//validate personality type
$personality = array("ESTJ", "ISTJ", "ENTJ", "INTJ", 
                    "ESTP", "ISTP", "ENTP", "INTP", 
                    "ESFJ", "ISFJ", "ENFJ", "INFJ", 
                    "ESFP", "ISFP", "ENFP", "INFP"
                );
if (!in_array($_POST["personality_type"], $personality)) {
    echo "Enter a valid Personality type";
    $has_error = TRUE;
}

// validate min/max seeking age.
if (!is_numeric($_POST["min_seek_age"])) {
    echo "Min seeking age is not a number.";
    $has_error = TRUE;
}

if (!is_numeric($_POST["max_seek_age"])) {
    echo "Max seeking age is not a number.";
    $has_error = TRUE;
}
// Write to singles.txt after validation. 
if (!$has_error) {
    //parse form details into a one line
    $user_details = array($_POST["name"],
                        $_POST["gender"],
                        $_POST["age"],
                        $_POST["personality_type"],
                        $_POST["os"],
                        $_POST["min_seek_age"],
                        $_POST["max_seek_age"]
                    );
    $user_info_to_write = implode(",", $user_details);
    echo $user_info_to_write;
    file_put_contents("singles.txt", PHP_EOL.$user_info_to_write, FILE_APPEND);
?>
    <pre>
        Thank you
        Welcome to NerdLuv, <?= $_POST["name"] ?>!
        Now log in to see your matches!
    </pre>
<?php } ?>
<?php include("bottom.html"); ?>
