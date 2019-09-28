<?php
    include ('includes/functions.php');

   $HandlAdd =  new  addCourseHandler;

//    var_dump($HandlAdd->connectMysqli());
// this checks our integration with $con is working. so it works

$sub = isset($_POST['submit']);
if ($sub){

    $HandlAdd->addcourse($_POST['category'], $_POST['Ctitle'], $_POST['level'], $_POST['description'], $_POST['content']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Course - Team Dinlas Mini Classroom</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
    <header id="header">
        <img src="assets/logo.png" alt="Team Dinlas" height="60">
        <form action="">
            <label for="search">
                <input type="search" name="search" id="search" placeholder="Find your classes">
                <span>&telrec;</span>
            </label>
        </form>
        <a href=""><img src="assets/avatar.png" alt="Img" width="50" height="50" class="avatar"></a>
    </header>
    <div class="container">
        <aside class="profile">
            <img src="assets/Avatar.png" alt="Name Surname">
            <h1>Name Surname</h1>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="#">Classroom</a></li>
                <li><a href="homepage.html">Logout</a></li>
            </ul>
        </aside>
        <main class="add-course">
            <h1 class="text-center main-color">Course Adding Form</h1>

            <form action="" method="POST">
                <p>
                    <label for="category">Select category <span>*</span></label>
                    <select name="category" id="category" required>
                        <option value="one">One</option>
                        <option value="two">Two</option>
                        <option value="three">Three</option>
                    </select>

                </p>
                <p>
                    <label for="title">Enter Course Title <span>*</span></label>
                    <input type="text" name="Ctitle" required>
                </p>
                <p>
                    <label for="level">Level <span>*</span></label>
                    <select name="level" id="level" required>
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Expert">Expert</option>
                    </select>
                </p>
                <p>
                    <label for="description">Description<span>*</span></label>
                    <textarea name="description" id="description" cols="30" rows="5" required></textarea>
                </p>
                <p>
                    <label for="content">Course Content<span>*</span></label>
                    <textarea name="content" id="content" cols="30" rows="10" placeholder="Enter your Markdown Formatted Content" required></textarea>
                </p>
                <button type="submit" class="submit" name="submit">Submit</button>
            </form>
        </main>
    </div>

    <footer id="footer">
        <div>
            <h2>Connect with us</h2>
            <ul>
                <li><a href="#"><img src="assets/facebook.png" alt="Facebook"></a></li>
                <li><a href="#"><img src="assets/twitter.png" alt="Twitter"></a></li>
                <li><a href="#"><img src="assets/youtube.png" alt="Youtube"></a></li>
                <li><a href="#"><img src="assets/googleplus.png" alt="Google+"></a></li>
            </ul>
        </div>
        <div><p>&copy; 2019 | Dinlas</p></div>
        <div>
            <h2>Sign up for our newsletter</h2>
            <form action="">
                <label for="email">
                    <input type="email" name="email" id="email" placeholder="example@dinlas.team">
                </label>
                <button type="submit" class="submit">Subscribe</button>
            </form>
        </div>
    </footer>
</body>
</html>