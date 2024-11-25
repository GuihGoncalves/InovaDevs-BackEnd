<?php
require_once '../../Database.php';
require_once '../../dao/ReservationDAO.php';
require_once '../../entities/Reservation.php';

use Entities\Reservation;
use DAO\ReservationDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$reservationDAO = new ReservationDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        if (!isset($_GET['reservationId'])) {
            echo json_encode(["message" => "ID da reserva não fornecido para atualização."]);
            exit;
        }

        $reservation_id = intval($_GET['reservationId']);
        $data = json_decode(file_get_contents("php://input"));
        $existingReservation = $reservationDAO->readById($reservation_id)->fetch(PDO::FETCH_ASSOC);

        if (!$existingReservation) {
            echo json_encode(["message" => "Reserva não encontrada."]);
            exit;
        }

        $reservation = new Reservation();
        $reservation->setReservation_id($reservation_id);
        $reservation->setUser_id($data->userId ?? $existingReservation['userId']);
        $reservation->setProduct_id($data->productId ?? $existingReservation['productId']);
        $reservation->setReservation_date($data->reservationDate ?? $existingReservation['reservationDate']);
        $reservation->setStatus($data->status ?? $existingReservation['status']);


        if ($reservationDAO->update($reservation)) {
            echo json_encode(["message" => "Reserva atualizada com sucesso!"]);
        } else {
            echo json_encode(["message" => "Erro ao atualizar a reserva."]);
        }
    } else {
        echo json_encode(["message" => "Método não permitido. Use PUT para atualizar uma reserva."]);
    }
} catch (PDOException $exception) {
    echo json_encode(["error" => $exception->getMessage()]);
}
?>
