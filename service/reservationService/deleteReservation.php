<?php
require_once '../../Database.php';
require_once '../../dao/ReservationDAO.php';
require_once '../../entities/Reservation.php';

use Entities\Reservation;
use DAO\ReservationDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$reservationDAO = new ReservationDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        if (isset($_GET['reservationId'])) {
            $reservationId = intval($_GET['reservationId']);

            if ($reservationDAO->delete($reservationId)) {
                echo json_encode(["message" => "Reserva deletada com sucesso!"]);
            } else {
                echo json_encode(["message" => "Erro ao deletar a reserva."]);
            }
        } else {
            echo json_encode(["message" => "ID da reserva não fornecido."]);
        }
    }else {
        echo json_encode(["message" => "Método não permitido. Use DELETE para excluir a reserva."]);
    }
} catch (PDOException $exception) {
    echo "Erro: " . $exception->getMessage();
}
?>
