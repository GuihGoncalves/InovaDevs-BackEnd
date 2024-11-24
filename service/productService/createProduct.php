<?php
require_once '../../Database.php';
require_once '../../dao/ProductDAO.php';
require_once '../../entities/Product.php';

use Entities\Product;
use DAO\ProductDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$productDAO = new ProductDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"));
        $product = new Product();


        if (isset($data->name, $data->description, $data->price, $data->image)) {

            $product->setName($data->name);
            $product->setDescription($data->description);
            $product->setPrice($data->price);
            $product->setImage($data->image);

            if ($productDAO->create($product)) {
                echo json_encode(["message" => "Produto criado com sucesso!"]);
            } else {
                echo json_encode(["message" => "Erro ao criar produto."]);
            }
        } else {
            echo json_encode(["message" => "Dados incompletos para criar um produto."]);
        }
    } else {
        echo json_encode(["message" => "Método não permitido. Use POST para criar um novo produto."]);
    }
} catch (PDOException $exception) {
    echo json_encode(["error" => $exception->getMessage()]);
}
?>
