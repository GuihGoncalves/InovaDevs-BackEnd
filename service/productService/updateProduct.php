<?php
require_once '../../Database.php';
require_once '../../dao/ProductDAO.php';
require_once '../../entities/Product.php';

use Entities\Product;
use DAO\ProductDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$productDAO = new ProductDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        if (!isset($_GET['productId'])) {
            echo json_encode(["message" => "ID do produto não fornecido para atualização."]);
            exit;
        }

        $product_id = intval($_GET['productId']);
        $data = json_decode(file_get_contents("php://input"));
        $existingProduct = $productDAO->read($product_id)->fetch(PDO::FETCH_ASSOC);

        if (!$existingProduct) {
            echo json_encode(["message" => "Produto não encontrado."]);
            exit;
        }

        $product = new Product();
        $product->setProduct_id($product_id);
        $product->setName($data->name ?? $existingProduct['name']);
        $product->setDescription($data->description ?? $existingProduct['description']);
        $product->setPrice($data->price ?? $existingProduct['price']);
        $product->setImage($data->image ?? $existingProduct['image']);

        if ($productDAO->update($product)) {
            echo json_encode(["message" => "Produto atualizado com sucesso!"]);
        } else {
            echo json_encode(["message" => "Erro ao atualizar o produto."]);
        }
    } else {
        echo json_encode(["message" => "Método não permitido. Use PUT para atualizar um produto."]);
    }
} catch (PDOException $exception) {
    echo json_encode(["error" => $exception->getMessage()]);
}
?>
