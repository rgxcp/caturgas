<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

        <div class="container">
            <?php $result = $mysqli->query("SELECT * FROM coba ORDER BY id DESC") or die($mysqli->error); ?>
            <div class="row justify-content-center">
                <form action="config.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label>Mata Kuliah</label>
                        <input type="text" class="form-control" name="matkul" value="<?php echo $matkul; ?>" placeholder="Mata kuliah apa?">
                    </div>
                    <div class="form-group">
                        <label>Tugas</label>
                        <input type="text" class="form-control" name="tugas" value="<?php echo $tugas; ?>" placeholder="Tugas-nya ngapain?">
                    </div>
                    <div class="form-group">
                        <label>Deadline</label>
                        <input type="text" class="form-control" name="deadline" value="<?php echo $deadline; ?>" placeholder="Kapan dikumpulin?">
                    </div>
                    <div class="form-group">
                    <?php if ($update == true): ?>
                        <button type="submit" class="btn btn-info" name="update">Update Tugas</button>
                    <?php else: ?>
                        <button type="submit" class="btn btn-primary" name="save">Simpan Tugas</button>
                    <?php endif; ?>
                    </div>
                </form>
            </div>
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
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
                                <a href="index.php?edit=<?php echo $row['id']; ?>"
                                    class="btn btn-info">Ubah</a>
                                <a href="config.php?delete=<?php echo $row['id']; ?>"
                                    class="btn btn-danger">Selesai</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </body>
</html>