<?php
require_once '../../Database.php';
require_once '../../dao/UserDAO.php';
require_once '../../entities/User.php';

use DAO\UserDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$userDAO = new UserDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        if (isset($_GET['userId'])) {
            $userId = intval($_GET['userId']);

            if ($userDAO->delete($userId)) {
                echo json_encode(["message" => "Usuário deletado com sucesso!"]);
            } else {
                echo json_encode(["message" => "Erro ao deletar o Usuário."]);
            }
        } else {
            echo json_encode(["message" => "ID do Usuário não fornecido."]);
        }
    }else {
        echo json_encode(["message" => "Método não permitido. Use DELETE para excluir o Usuário."]);
    }
} catch (PDOException $exception) {
    echo "Erro: " . $exception->getMessage();
}
?>
