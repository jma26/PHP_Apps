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
    <div class="result-container">
        <ul>
            <?php 
                $currentYear = (date("Y"));
                $currentMonth = (date("n"));
                $currentDay = (date("j"));
                $months = array(
                    "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
                );
                $bdayArray = array();

                // Update $bdayArray with post submission
                if (isset($_POST['submit'])) {
                    array_push($bdayArray, array(
                        "first" => $_POST["firstname"],
                        "last" => $_POST["lastname"],
                        "month" => $_POST["month"],
                        "day" => $_POST["day"],
                        "year" => $_POST["year"]
                    ));
                };

                // Display each person's name and age
                if (isset($bdayArray)) {
                    foreach($bdayArray as $person) {
                        $fullname = $person['first'] . ' ' . $person['last'];
                        $birthday = $person['month'] . ', ' . $person['day'] . ', ' . $person['year'];

                        $year = $person['year'];
                        $month = (array_search($person['month'], $months) + 1);
                        $day = $person['day'];
                        
                        // Retrieve years, months, and days old
                        $dateString =  $year . '-' . $month . '-' . $day;
                        // $date is a DateTimeObject
                        $date = DateTime::createFromFormat('Y-n-j', $dateString);
                        // Find difference
                        $diff = $date->diff(new DateTime());
                        echo $diff->format('%y years %m months and %d days');
                        // Display peron's age in year, months, day
                        echo '<li>' . $fullname . "'s birthday is " . $birthday . '. Person is ' . $year . ' years old </li>';
                    };
                }
            ?>
        </ul>
    </div>
</body>
</html>