<?php
namespace DAO;

use Entities\Reservation;
use PDO;

class ReservationDAO {
    private $conn;
    private $table_name = "reservations";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create(Reservation $reservation) {
        $query = "INSERT INTO " . $this->table_name . " (user_id, product_id, reservation_date, status) VALUES (:userId, :productId, :reservationDate, :status)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":userId", $reservation->getUser_id());
        $stmt->bindParam(":productId", $reservation->getProduct_id());
        $stmt->bindParam(":reservationDate", $reservation->getReservation_date());
        $stmt->bindParam(":status", $reservation->getStatus());

        return $stmt->execute();
    }

    public function read($cpf = null) {
        $query = "SELECT r.* FROM " . $this->table_name . " r";
        if ($cpf) {
            $query .= ", users u where r.user_id = u.user_id and u.cpf = :cpf";
        }

        $stmt = $this->conn->prepare($query);

        if ($cpf) {
            $stmt->bindParam(":cpf", $cpf, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt;
    }

    public function readById($reservationId = null) {
        $query = "SELECT * FROM " . $this->table_name;
        if ($reservationId) {
            $query .= " where reservation_id = :reservationId";
        }

        $stmt = $this->conn->prepare($query);

        if ($reservationId) {
            $stmt->bindParam(":reservationId", $reservationId, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt;
    }

    public function update(Reservation $reservation) {
        $query = "UPDATE " . $this->table_name . " SET user_id = :userId, product_id = :productId, reservation_date = :reservationDate, status = :status WHERE reservation_id = :reservationId";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":userId", $reservation->getUser_id());
        $stmt->bindParam(":productId", $reservation->getProduct_id());
        $stmt->bindParam(":reservationDate", $reservation->getReservation_date());
        $stmt->bindParam(":status", $reservation->getStatus());
        $stmt->bindParam(":reservationId", $reservation->getReservation_id(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete($reservationId) {
        $query = "DELETE FROM " . $this->table_name . " WHERE reservation_id = :reservationId";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":reservationId", $reservationId, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
?>
