<?php
require_once '../../Database.php';
require_once '../../dao/ProductDAO.php';
require_once '../../entities/Product.php';

use DAO\ProductDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$productDAO = new ProductDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['productId'])) {
            $productId = intval($_GET['productId']);
            $stmt = $productDAO->read($productId);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            echo json_encode($product ? $product : ["message" => "Produto não encontrado."]);
        } else {
            $stmt = $productDAO->read();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode($products ? $products : ["message" => "Nenhum produto encontrado."]);
        }
    }
} catch (PDOException $exception) {
    echo "Erro: " . $exception->getMessage();
}
?>
