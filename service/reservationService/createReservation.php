<?php
require_once '../../Database.php';
require_once '../../dao/ReservationDAO.php';
require_once '../../entities/Reservation.php';

use Entities\Reservation;
use DAO\ReservationDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$reservationDAO = new ReservationDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"));
        $reservation = new Reservation();


        if (isset($data->userId, $data->productId, $data->reservationDate, $data->status)) {
            $reservation->setUser_id($data->userId);
            $reservation->setProduct_id($data->productId);
            $reservation->setReservation_date($data->reservationDate);
            $reservation->setStatus($data->status);

            if ($reservationDAO->create($reservation)) {
                echo json_encode(["message" => "Reserva criada com sucesso!"]);
            } else {
                echo json_encode(["message" => "Erro ao criar reserva."]);
            }
        } else {
            echo json_encode(["message" => "Dados incompletos para criar uma reserva."]);
        }
    } else {
        echo json_encode(["message" => "Método não permitido. Use POST para criar uma nova reserva."]);
    }
} catch (PDOException $exception) {
    echo json_encode(["error" => $exception->getMessage()]);
}
?>