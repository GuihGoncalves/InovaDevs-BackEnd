<?php
require_once '../../Database.php';
require_once '../../dao/PurchaseDAO.php';
require_once '../../entities/Purchase.php';

use DAO\PurchaseDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$purchaseDAO = new PurchaseDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['purchaseId'])) {
            $purchaseId = intval($_GET['purchaseId']);
            $stmt = $purchaseDAO->read($purchaseId);
            $purchase = $stmt->fetch(PDO::FETCH_ASSOC);

            echo json_encode($purchase ? $purchase : ["message" => "Nenhuma Compra encontrado."]);
        } else {
            $stmt = $purchaseDAO->read();
            $purchases = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode($purchases ? $purchases : ["message" => "Nenhuma ordem de compra encontrado."]);
        }
    }
} catch (PDOException $exception) {
    echo "Erro: " . $exception->getMessage();
}
?>
