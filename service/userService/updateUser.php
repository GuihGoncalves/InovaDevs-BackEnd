<?php
require_once '../../Database.php';
require_once '../../dao/UserDAO.php';
require_once '../../entities/User.php';

use Entities\User;
use DAO\UserDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$userDAO = new UserDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        if (!isset($_GET['userId'])) {
            echo json_encode(["message" => "ID do Usuário não fornecido para atualização."]);
            exit;
        }

        $userId = intval($_GET['userId']);
        $data = json_decode(file_get_contents("php://input"));
        $existingUser = $userDAO->read($userId)->fetch(PDO::FETCH_ASSOC);

        if (!$existingUser) {
            echo json_encode(["message" => "Usuário não encontrado."]);
            exit;
        }
        $user = new User();
        $user->setUser_id($userId);
        $user->setName(isset($data->name) ? $data->name : $existingUser['name']);
        $user->setCpf(isset($data->cpf) ? $data->cpf : $existingUser['cpf']);
        $user->setPhone(isset($data->phone) ? $data->phone : $existingUser['phone']);
        $user->setEmail(isset($data->email) ? $data->email : $existingUser['email']);
        $user->setPassword(isset($data->password) ? $data->password : $existingUser['password']);
        $user->setUser_type(isset($data->userType) ? $data->userType : $existingUser['userType']);
            
        if ($userDAO->update($user)) {
            echo json_encode(["message" => "Usuário atualizado com sucesso!"]);
        } else {
            echo json_encode(["message" => "Erro ao atualizar o usuário."]);
        }
    } else {
        echo json_encode(["message" => "Método não permitido. Use PUT para atualizar um usuários."]);
    }
} catch (PDOException $exception) {
    echo json_encode(["error" => $exception->getMessage()]);
}
?>
