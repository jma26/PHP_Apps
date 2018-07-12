<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <title> What's your age: PHP </title>
</head>
<body>
    <header>
        <h1 class="header-headline"> What's your age? </h1>
    </header>
    <div class="form-container">
        <form action="" method="POST">
            <h3 class="form-headline"> Full name </h3>
            <input type="text" name="firstname" placeholder="First name">
            <input type="text" name="lastname" placeholder="Last name">
            <div class="date-container">
                <h3 class="form-headline"> Birthday </h3>
                <select name="month">
                    <option value="January"> January </option>
                    <option value="February"> February </option>
                    <option value="March"> March </option>
                    <option value="April"> April </option>
                    <option value="May"> May </option>
                    <option value="June"> June </option>
                    <option value="July"> July </option>
                    <option value="August"> August </option>
                    <option value="September"> September </option>
                    <option value="October"> October </option>
                    <option value="November"> November </option>
                    <option value="December"> December </option>
                </select>
                <input type="number" min="1" max="31" name="day" placeholder="Day">
                <input type="number" max="<?php echo date('Y'); ?>" name="year" placeholder="Year">
            </div>
            <input name="submit" type="submit" value="Submit">
        </form>
    </div>
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $bdayArray = Array(
            "first" => $_POST["firstname"],
            "last" => $_POST["lastname"],
            "month" => $_POST["month"],
            "day" => $_POST["day"],
            "year" => $_POST["year"]
        );
    };

    print_r($bdayArray);
?>