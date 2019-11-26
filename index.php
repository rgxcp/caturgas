<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/31372f9642.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="script.js"></script>
        <style>
            .customButton {
                margin: 1.5em 0.6em;
                padding: 0.5em 2.4em;
            }
            .customTable {
                margin: 1em 5em;
            }
        </style>
        <title>Catat Tugas</title>
    </head>
    <body>
        <?php require_once 'config.php'; ?>

        <nav class="navbar sticky-top navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Android_O_Preview_Logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Ada tugas apa hari ini?
            </a>
            <form class="form-inline">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" id="kataKunci" placeholder="Cari tugas?" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </form>
        </nav>

        <div class="container">
            <div class="d-flex justify-content-center">
                <form action="config.php" method="POST" class="w-50">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="pt-4">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-warning"><i class="far fa-id-badge"></i></div>
                            </div>
                            <input type="text" autocomplete="off" class="form-control" id="inlineFormInputGroup" name="matkul" value="<?php echo $matkul; ?>" placeholder="Mata Kuliah">
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-warning"><i class="far fa-clipboard"></i></div>
                            </div>
                            <input type="text" autocomplete="off" class="form-control" id="inlineFormInputGroup" name="tugas" value="<?php echo $tugas; ?>" placeholder="Tugas">
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-warning"><i class="far fa-hourglass"></i></div>
                            </div>
                            <input type="text" autocomplete="off" class="form-control" id="inlineFormInputGroup" name="deadline" value="<?php echo $deadline; ?>" placeholder="Deadline">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary customButton" data-toggle="tooltip" data-placement="bottom" title="Tambah Tugas" name="create">Tambah</button>
                        <button type="submit" class="btn btn-success customButton" data-toggle="tooltip" data-placement="bottom" title="Update Tugas" name="update">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="d-flex table-data customTable">
                <table class="table table-striped table-dark" id="containerTabel">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mata Kuliah</th>
                            <th>Tugas</th>
                            <th>Deadline</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <?php $result = $mysqli->query("SELECT * FROM coba ORDER BY id DESC") or die($mysqli->error); ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['matkul']; ?></td>
                            <td><?php echo $row['tugas']; ?></td>
                            <td><?php echo $row['deadline']; ?></td>
                            <td>
                                <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                <a href="config.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fas fa-check"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </body>
</html>