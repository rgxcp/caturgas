<?php
    session_start();

    $mysqli = new mysqli('localhost', 'root', '', 'sbd_satu') or die(mysqli_error($mysqli));

    $matkul = "";
    $tugas = "";
    $deadline = "";

    if (isset($_POST['create'])) {
        $matkul = $_POST['matkul'];
        $tugas = $_POST['tugas'];
        $deadline = $_POST['deadline'];
        $mysqli->query("INSERT INTO caturgas(matkul, tugas, deadline) VALUES('$matkul', '$tugas', '$deadline')") or die($mysqli->error());
        header("location: index.php");
    }

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $result = $mysqli->query("SELECT * FROM caturgas WHERE id=$id") or die($mysqli->error());
        $row = $result->fetch_array();
        $matkul = $row['matkul'];
        $tugas = $row['tugas'];
        $deadline = $row['deadline'];
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $matkul = $_POST['matkul'];
        $tugas = $_POST['tugas'];
        $deadline = $_POST['deadline'];
        $result = $mysqli->query("UPDATE caturgas SET matkul='$matkul', tugas='$tugas', deadline='$deadline' WHERE id=$id") or die($mysqli->error());
        header("location: index.php");
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM caturgas WHERE id=$id") or die($mysqli->error());
        header("location: index.php");
    }
?>