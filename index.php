<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <title>Catat Tugas</title>
    </head>
    <body>
        <?php require_once 'config.php'; ?>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>

        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Android_O_Preview_Logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> Ada tugas apa hari ini?
            </a>
        </nav>

        <div class="container">
            <?php $result = $mysqli->query("SELECT * FROM coba ORDER BY id DESC") or die($mysqli->error); ?>
            <div class="d-flex justify-content-center">
                <form action="config.php" method="POST" class="w-50">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="pt-2">
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
                        <button type="submit" style="margin: 1.5em 0.6em; padding: 0.5em 2.4em;" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Tambah Tugas" name="create">Tambah</button>
                        <button type="submit" style="margin: 1.5em 0.6em; padding: 0.5em 2.4em;" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Update Tugas" name="update">Update</button>
                    </div>
                </form>
            </div>
            <div class="d-flex table-data" style="margin: 1em 10em;">
                <table class="table table-striped table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mata Kuliah</th>
                            <th>Tugas</th>
                            <th>Deadline</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
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