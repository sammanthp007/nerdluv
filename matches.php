<?php include("top.html"); ?>
<div>
    <form action="matches-submit.php" method="get">
        <fieldset>
            <legend> Returning User: </legend>
            <strong class="column"> Name: </strong>
            <input type="text" name="name" maxlength="16"><br><br>
            <input type="submit" value="View My Matches">
        </fieldset>
    </form>
</div>

<?php include("bottom.html"); ?>
