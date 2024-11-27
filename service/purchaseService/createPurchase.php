<?php
require_once '../../Database.php';
require_once '../../dao/PurchaseDAO.php';
require_once '../../entities/Purchase.php';

use Entities\Purchase;
use DAO\PurchaseDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$purchaseDAO = new PurchaseDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"));
        $purchase = new Purchase();


        if (isset($data->userId, $data->productId, $data->quantity, $data->total, $data->deliveryDate, $data->deliveryTime, $data->status)) {

            $purchase->setUser_id($data->userId);
            $purchase->setProduct_id($data->productId);
            $purchase->setQuantity($data->quantity);
            $purchase->setTotal($data->total);
            $purchase->setDelivery_date($data->deliveryDate);
            $purchase->setDelivery_time($data->deliveryTime);
            $purchase->setStatus($data->status);

            if ($purchaseDAO->create($purchase)) {
                echo json_encode(["message" => "Compra feita com sucesso!"]);
            } else {
                echo json_encode(["message" => "Erro ao criar ordem de compra."]);
            }
        } else {
            echo json_encode(["message" => "Forneça todos os Dados necessários."]);
        }
    } else {
        echo json_encode(["message" => "Método não permitido. Use POST para a chamada do endpoint."]);
    }
} catch (PDOException $exception) {
    echo json_encode(["error" => $exception->getMessage()]);
}
?>
