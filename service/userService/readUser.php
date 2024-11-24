<?php
require_once '../../Database.php';
require_once '../../dao/UserDAO.php';
require_once '../../entities/User.php';

use Entities\User;
use DAO\UserDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$userDAO = new UserDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $userDAO = new UserDAO($conn);

        if (isset($_GET['userId'])) {
            $userId = $_GET['userId'];
            $stmt = $userDAO->read($userId);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                echo json_encode($user);
            } else {
                echo json_encode(["message" => "Usuário não encontrado."]);
            }
        } else {
            $stmt = $userDAO->read();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($users) {
                echo json_encode($users);
            } else {
                echo json_encode(["message" => "Nenhum usuário encontrado."]);
            }
        }
    }
} catch (PDOException $exception) {
    echo "Erro: " . $exception->getMessage();
}
?>
