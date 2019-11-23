<?php

require_once 'config.php';

$keyword = $_GET['keyword'];

// $hasil_query = $mysqli->query("SELECT * FROM coba WHERE matkul LIKE '%$keyword%' OR deadline LIKE '%$keyword%' OR deadline LIKE '%$keyword%'") or die($mysqli->error);

// while ($hasil_array = $hasil_query->fetch_assoc()):
//     var_dump($hasil_array);
// endwhile;

?>

<div class="container" id="containerTabel1">
    <div class="d-flex table-data" style="margin: 1em 10em;" id="containerTabel2">
        <table class="table table-striped table-dark" id="containerTabel3">
            <thead class="thead-dark">
                <tr>
                    <th>Mata Kuliah</th>
                    <th>Tugas</th>
                    <th>Deadline</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
                <?php $result = $mysqli->query("SELECT * FROM coba WHERE matkul LIKE '%$keyword%' OR deadline LIKE '%$keyword%' OR deadline LIKE '%$keyword%'") or die($mysqli->error); ?>
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