<!-- PHP CODE HERE -->
<?php
// db connection
include('./includes/_dbConnect.php');

// value will be changed if the condition below executes
$update = false;
$delete = false;

// to update records
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $titleEdit = $_POST['titleEdit'];
    $descriptionEdit = $_POST['descriptionEdit'];

    // sql query to be executed
    $sql = "UPDATE `inotestable` SET `title` = '$titleEdit', `description` = '$descriptionEdit' WHERE `inotestable`.`id` = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $update = true;
    }
}

// to delete the records
// deleting listing results
if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;

    // delete query to be executed
    $sql = "DELETE FROM `iNotesTable` WHERE `id` = '$sno'";
    $result = mysqli_query($conn, $sql);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iNotes - Saved Notes</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <!-- INCLUDING NAVBAR -->
    <?php
    include('./includes/_nav.php');
    ?>

    <!-- SHOWING ALERT IF THE UPDATES ARE TRUE -->
    <?php
    if ($update == true) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your record has been updated.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>


    <hr>
    <div class="container my-4">
        <h1 class="display-5">Saved Notes Below.</h1>
    </div>
    <hr>

    <!-- TABLE BELOW -->
    <div class="container my-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date/Time</th>
                    <th scope="col">Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- FETCHING DATA FROM THE DB TABLE -->
                <?php
                $sql = "SELECT * FROM `iNotesTable`";
                $result = mysqli_query($conn, $sql);
                $number = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $number = $number + 1;
                ?>
                    <tr>
                        <th scope="row"><?php echo $number; ?></th>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['dateTime']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary fa-solid fa-pen-to-square edit" data-bs-toggle="modal" data-bs-target="#updateModal" id="<?php echo $row['id']; ?>"></button>
                            <button class="btn btn-danger fa-solid fa-trash-can delete" id="d<?php echo $row['id']; ?>"></button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


    <!-- UPDATE RECORDS MODAL HERE -->

    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="saved_notes.php" method="POST">
                        <input type="hidden" name="id" id="updateId">
                        <div class="mb-3">
                            <label for="title" class="form-label">Update Title Here.</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit">
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="descriptionEdit" style="height: 100px" name="descriptionEdit"></textarea>
                            <label for="description">Update Description Here.</label>
                        </div>
                        <button type="submit" class="btn btn-primary my-2">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- MY JAVASCRIPT -->
    <script src="./javascript/savedNotes.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
