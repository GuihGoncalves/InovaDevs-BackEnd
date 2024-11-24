<?php
require_once '../../Database.php';
require_once '../../dao/UserDAO.php';
require_once '../../entities/User.php';

use Entities\User;
use DAO\UserDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$userDAO = new UserDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"));
        $user = new User();


        if (isset($data->name, $data->cpf, $data->phone, $data->email, $data->password, $data->user_type)) {
            $user->setName($data->name);
            $user->setCpf($data->cpf);
            $user->setPhone($data->phone);
            $user->setEmail($data->email);
            $user->setPassword($data->password);
            $user->setUser_type($data->user_type);

            if ($userDAO->create($user)) {
                echo json_encode(["message" => "Usuário criado com sucesso!"]);
            } else {
                echo json_encode(["message" => "Erro ao criar usuário."]);
            }
        } else {
            echo json_encode(["message" => "Dados incompletos para criar um usuário."]);
        }
    } else {
        echo json_encode(["message" => "Método não permitido. Use POST para criar um novo usuário."]);
    }
} catch (PDOException $exception) {
    echo json_encode(["error" => $exception->getMessage()]);
}
?>
