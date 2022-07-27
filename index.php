<!-- PHP CODE HERE -->
<?php
include('./includes/_dbConnect.php');

// checking if the form method is post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // sql query to be executed
    $sql = "INSERT INTO `inotestable` (`title`, `description`) VALUES ('$title', '$description')";
    $result = mysqli_query($conn, $sql);

    // user will be redirected to this link after successfull insertion
    if ($result) {
        header("location: saved_notes.php");
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iNotes - Saving Notes Made Easy</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <?php
    include('./includes/_nav.php');
    ?>
    <hr>

    <!-- CONTENT DIV HERE -->
    <div class="container my-4">

        <div class="info my-2">
            <h1 class="display-6">About us</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate minus, velit id reiciendis cum quo ducimus eveniet delectus debitis, ut consectetur! Fuga iste quas commodi earum saepe, illo, architecto alias voluptate illum quod quia nemo voluptatibus. Magni, dolorem. Laudantium corrupti autem dolore eos aliquam nam hic asperiores voluptatem mollitia beatae. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores eaque officiis quas, rem nesciunt consequatur veritatis officia amet, distinctio aspernatur doloribus ipsa fugit, quidem beatae. Assumenda, sunt pariatur! Deleniti, repellat?Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam ab eligendi et harum nisi adipisci vel dolore molestias, maiores, possimus minus ratione qui quos, repellendus maxime numquam magni. At, officia!</p>
        </div>

        <hr>

        <div class="ourMission my-2">
            <h1 class="display-6">Our Mission</h1>
            <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum molestiae velit sequi vel ducimus, eum, dicta iusto, distinctio adipisci molestias veniam tenetur? Quod sed cupiditate odio quidem odit quae eveniet laudantium, veritatis reiciendis eaque ut omnis tempora est pariatur veniam facilis sunt in soluta, magni, illum iusto rem autem. Voluptas necessitatibus voluptate maxime eum ad dolorem, vero dolorum accusamus tempora. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit, blanditiis repudiandae! Repudiandae, quae non alias eaque tenetur aliquid cupiditate rem quidem vel dolorum autem corrupti pariatur facere itaque nostrum consequuntur?</p>
        </div>

        <hr>

        <div class="iNotes my-2">
            <h1 class="display-6 font-weight">iNotes - Info</h1>
            <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta porro cumque harum, iure, perspiciatis amet enim quasi ipsum deleniti tempore labore dolores explicabo molestiae corporis obcaecati! Suscipit esse magni est itaque, fugit similique perspiciatis explicabo ipsa, quasi natus totam architecto sunt earum beatae iure ab quidem magnam eaque enim quos ipsum. Ea dignissimos mollitia consectetur. Blanditiis aperiam eaque numquam nam quisquam. Hic possimus quia veniam libero adipisci tempora laudantium voluptate.</p>
        </div>

        <!-- BUTTONS HERE TO SHOW/HIDE FORM-->
        <button class="btn btn-primary" id="toggleShow" onclick="toggleShow()">Show Form</button>
        <button class="btn btn-primary" id="toggleHide" onclick="toggleHide()">Hide Form</button>
    </div>

    <hr>

    <!-- FORM STARTS HERE -->
    <div class="container my-4" id="formContainer">
        <h1 class="display-5 container">Save Your Notes Below.</h1>
        <hr>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Title Here.</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-floating">
                <textarea class="form-control" id="description" style="height: 100px" name="description"></textarea>
                <label for="description">Description Here.</label>
            </div>
            <button type="submit" class="btn btn-primary my-2">Submit</button>
        </form>
    </div>

    <!-- MY JAVASCRIPT -->
    <script src="./javascript/index.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>