<?php
require_once '../../Database.php';
require_once '../../dao/ReservationDAO.php';
require_once '../../entities/Reservation.php';

use Entities\Reservation;
use DAO\ReservationDAO;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

$db = new Database();
$conn = $db->getConnection();
$reservationDAO = new ReservationDAO($conn);

try {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['cpf'])) {
            $cpf = intval($_GET['cpf']);
            $stmt = $reservationDAO->read($cpf);
            $reservation = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode($reservation ? $reservation : ["message" => "Reserva não encontrado."]);
        } else {
            $stmt = $reservationDAO->read();
            $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode($reservations ? $reservations : ["message" => "Nenhuma reserva encontrado."]);
        }
    }
} catch (PDOException $exception) {
    echo "Erro: " . $exception->getMessage();
}
?>
