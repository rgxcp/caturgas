<?php

require_once 'config.php';

$kataKunci = $_GET['kataKunci'];

$result = $mysqli->query("SELECT * FROM caturgas WHERE matkul LIKE '%$kataKunci%' OR tugas LIKE '%$kataKunci%' OR deadline LIKE '%$kataKunci%' ORDER BY id DESC") or die($mysqli->error);

?>

<table class="table table-striped table-dark" id="containerTabel">
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