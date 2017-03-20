<?php include("top.html"); ?>

<div>
    <h1>New User Signup:</h1>

<table>
    <form action="signup-submit.php" method="post">
    <tr>
        <td>Name:</td> 
        <td>
            <input type="text" name="name" size="17" maxlength="16"> 
        </td>
    </tr>
    <tr>
        <td>Gender:</td>
        <td>
            <input type="radio" name="gender" value="M">Male
            <input type="radio" name="gender" value="F" checked>Female
        </td>
    </tr>
    <tr>
        <td>Age:</td>
        <td>
            <input type="text" name="age" size="6" maxlength="2">
        </td>
    </tr>
    <tr>
        <td>Personality type:</td>
        <td>
            <input type="text" name="personality_type" size="6" maxlength="4">
        </td>
    </tr>
    <tr>
        <td>
            Favorite OS:
        </td>
        <td>
            <select name="os">
                <option value="Linux">Linux</option>
                <option value="Mac OS X" >Mac OS X</option>
                <option value="Windows"selected>Windows</option>
            </select><br>
        </td>
    </tr>
    <tr>
        <td>
            Seeking age:
        </td>
        <td>
            <input type="text" name="min_seek_age" size="6" maxlength="2" placeholder="min"> to
            <input type="text" name="max_seek_age" size="6" maxlength="2" placeholder="max">
        </td>
    </tr>
    <tr>
        <td>
            <input type="submit" value="Sign Up">
        </td>
    </tr>
    </form>
</table>
</div>

<?php include("bottom.html"); ?>
