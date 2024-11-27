<?php
require_once '../../Database.php';
require_once '../../dao/Purchase.php';
require_once '../../entities/Purchase.php';

use DAO\PurchaseDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$purchaseDAO = new PurchaseDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        if (isset($_GET['purchaseId'])) {
            $purchaseId = intval($_GET['purchaseId']);

            if ($purchaseDAO->delete($purchaseId)) {
                echo json_encode(["message" => "Deletado com sucesso!"]);
            } else {
                echo json_encode(["message" => "Erro ao deletar."]);
            }
        } else {
            echo json_encode(["message" => "ID não fornecido."]);
        }
    }else {
        echo json_encode(["message" => "Método não permitido. Use DELETE para excluir a ordem de compra."]);
    }
} catch (PDOException $exception) {
    echo "Erro: " . $exception->getMessage();
}
?>
