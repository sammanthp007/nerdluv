<?php

include("top.html");

/* Get all singles */
$singles = file("singles.txt");

/* Find and get user */
$user_info_line = '';
for ($i = 0; $i < count($singles); $i++) {
    $user_info_line = strstr($singles[$i], $_GET["name"]);
    if ($user_info_line !== FALSE) {
        break;
    }
}

$user_info = explode(",", $user_info_line);

$user_gender = $user_info[1];
$user_age = (int)$user_info[2];
$user_personality = $user_info[3];
$user_os = $user_info[4];
$user_min_seek = (int)$user_info[5];
$user_max_age = (int)$user_info[6];

/* get opposite gender */
$match_gender = '';
if (strcmp($user_gender, 'M') === 0) {
    $match_gender = 'F';
} else {
    $match_gender = 'M';
}


$matches = array();

/* Get matches */
?>
<ul>
<?php
$is_first = true;
for ($i = 0; $i < count($singles); $i++) {
    /* Get others info */
    $other_info_array = explode(",", $singles[$i]);
    $other_gender = $other_info_array[1];
    $other_age = (int)$other_info_array[2];
    $other_personality = $other_info_array[3];
    $other_os = $other_info_array[4];
    $other_min_seek = (int)$other_info_array[5];
    $other_max_seek = (int)$other_info_array[6];

    /* Check gender */
    if (strcmp($match_gender, $other_gender) === 0) {
        
        /* Check age compatibility */
        $user_matches_others_choice = NULL;
        $other_matches_users_choice = NULL;

        if ($other_min_seek <= $user_age && $user_age <= $other_max_seek)
            $user_matches_others_choice = TRUE;
        
        if($user_min_seek <= $other_age && $other_age <= $user_max_age)
            $other_matches_users_choice = TRUE;
        
        /* Check favorite OS */
        if($user_matches_others_choice && $other_matches_users_choice){
            if (strcmp($user_os, $other_os) === 0) {

                /* At least one personality type in common */
                $inRegex = "/[".$user_personality."]/";
                if (preg_match($inRegex, $other_personality) === 1) {
                    $matches[] = $singles[$i];
                    
                    if ($is_first) {
                    echo '<b>Matches for ' . $_GET["name"] . '</b>';
                    $is_first = false;
                }
?>
                <li>
                    <table>
                        <tr>
                            <td>
                                <img src="user.jpg" />
                            </td>
                            <td>
                        <p id="matchname"><?= $other_info_array[0] ?></p><br>
                        <ul>
                            <li>gender: <?= $other_gender ?></li>
                             <li> age: <?= $other_age ?> </li>
                             <li> type: <?= $other_personality ?> </li>
                             <li> OS: <?= $other_os ?></li>
                        </ul>
                            </td>
                        </tr>
                    </table>
                </li>
<?php
                }
            }
        }
    }
}
?>
</ul>

<?php
if (count($matches) === 0) {
?>
    <div> No match is found. </div>
<?php
}
include("bottom.html"); ?>
