
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel=" stylesheet" href="style.css">
    
    
</head>
<body>
    <nav> 
        <label class="logo">W-School</label>
        <Ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contct</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
            
        </Ul>
    </nav>

    <div class="section1">
        <label class="img_text">We Teach Student With Care</label>
        <img class="main_img" src="school_management.jpg">

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class= "welcome_img" src="school2.jpg">
            </div>
            <div class="col-md-8">
                <h1>Welcome to W-School</h1>
                <p>To answer this question, let's take a look at text-start.html—the starting point of our running example for this article (a nice hummus recipe). You should save a copy of this file on your local machine, as you'll need it for the exercises later on. This document's body currently contains multiple pieces of content. They aren't marked up in any way, but they are separated with line breaks (Enter/Return pressed to go onto the next line).</p>
            </div>

        </div>

    </div>

    <center> <h1>Our Teachers</h1></center>
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <img class="teacher" src="teacher1.jpg">
                <p>A teacher is a person who does the work of teaching. The teacher performs the teaching-learning process with ease and expertise. The teacher enlightens us on our path to move towards achieving the completion. The first role model of children outside their family is their teacher. Teachers need to be virtuous.</p>
            </div>

            <div class="col-md-4">
                <img class="teacher" src="teacher2.jpg">
                <p>A teacher is a person who does the work of teaching. The teacher performs the teaching-learning process with ease and expertise. The teacher enlightens us on our path to move towards achieving the completion. The first role model of children outside their family is their teacher. Teachers need to be virtuous.</p>
            </div>

            <div class="col-md-4">
                <img class="teacher" src="teacher3.jpg">
                <p>A teacher is a person who does the work of teaching. The teacher performs the teaching-learning process with ease and expertise. The teacher enlightens us on our path to move towards achieving the completion. The first role model of children outside their family is their teacher. Teachers need to be virtuous.</p>
            </div>

        </div>

    </div>

    <center> <h1>Our Courses</h1></center>
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <img class="teacher" src="web.jpg">
                <h3>Web Development</h3>
                
            </div>

            <div class="col-md-4">
                <img class="teacher" src="graphic.jpg">
                <h3>Graphic Design</h3>
                
            </div>

            <div class="col-md-4">
                <img class="teacher" src="marketing.png.">
                <h3>Marketing</h3>
                
            </div>

        </div>

    </div>
    
    <!-- <center> 
        <h1>Admission Form</h1>
     </center>
    <div align="center" class="admission_form">
        <form>
            <div>
                <label class="label_text">Name</label>
                <input type="text">
            </div>
            <div>
                <label class="label_text">Email</label>
                <input type="text">
            </div>
            <div>
                <label class="label_text">Phone</label>
                <input type="text">
            </div>
            <div>
                <label class="label_text">Message</label>
                <textarea></textarea>
            </div>
            <div>
               
                <input type="Submit">
            </div>
        </form>

    </div> -->
    <div class="admission_form">
        <h1 class="adm">Admission Form</h1>
        <form class="adm_form" action="data_check.php" method="POST">
            <div class="adm_int">
                <label for="name" class="label_text">Name</label>
                <input class="input_deg" type="text" id="name" name="name">
            </div>
            <div class="adm_int">
                <label for="email" class="label_text">Email</label>
                <input class="input_deg" type="text" id="email" name="email">
            </div>
            <div class="adm_int">
                <label for="phone" class="label_text">Phone</label>
                <input  class="input_deg" type="text" id="phone" name="phone">
            </div>
            <div class="adm_int">
                <label for="message" class="label_text">Message</label>
                <textarea class="input_txt" id="message" name="message"></textarea>
            </div>
            <div class="adm_int">
                <input class="btn btn-primary" id="submit" type="submit" value="Apply" name="apply">
            </div>
        </form>
    </div>
    <footer>
        <h3 class="footer_txt">All @copyright reserved by Web Tech</h3>
    </footer>

</body>
</html>