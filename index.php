<!DOCTYPE html>
<html lang="en">
<head>
    <title>Catat Tugas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
        <?php $result = $mysqli->query("SELECT * FROM coba") or die($mysqli->error); ?>
        <div class="row">
            <div class="col-sm">
                <div class="row justify-content-center position-fixed">
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
            </div>
            <div class="col-8">
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
        </div>
    </div>
</body>
</html>