<!DOCTYPE HTML>  
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <h2>Enter an interval of Years to check for holiday mondays</h2>
    <p><span class="error">* required field</span></p>
    <form method="get" action="/part4_result.php">
        Interval start <br>
        <input type="text" name="startYear">
        <span class="error">*</span><br><br>
        Interval end <br>
        <input type="text" name="endYear">
        <span class="error">*</span><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>