<?php
include("PDOconn.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $valor = $_POST['value'];

    $query = "UPDATE `tbl_pedidos` SET `id_estado`= :valor WHERE `id` = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
}
?>