<?php
require_once '../../Database.php';
require_once '../../dao/ProductDAO.php';
require_once '../../entities/Product.php';

use DAO\ProductDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$productDAO = new ProductDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        if (isset($_GET['productId'])) {
            $productId = intval($_GET['productId']);

            if ($productDAO->delete($productId)) {
                echo json_encode(["message" => "Produto deletado com sucesso!"]);
            } else {
                echo json_encode(["message" => "Erro ao deletar o produto."]);
            }
        } else {
            echo json_encode(["message" => "ID do produto não fornecido."]);
        }
    }else {
        echo json_encode(["message" => "Método não permitido. Use DELETE para excluir o Produto."]);
    }
} catch (PDOException $exception) {
    echo "Erro: " . $exception->getMessage();
}
?>
