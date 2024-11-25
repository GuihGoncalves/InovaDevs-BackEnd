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
        $query = "INSERT INTO " . $this->table_name . " (name, user_id, product_id, people_qtt, reservation_date, reservation_time, status, area) VALUES (:name, :userId, :productId, :peopleQtt, :reservationDate, :reservationTime, :status, :area)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $reservation->getName());
        $stmt->bindParam(":userId", $reservation->getUser_id());
        $stmt->bindParam(":productId", $reservation->getProduct_id());
        $stmt->bindParam(":peopleQtt", $reservation->getPeople_qtt());
        $stmt->bindParam(":reservationDate", $reservation->getReservation_date());
        $stmt->bindParam(":reservationTime", $reservation->getReservation_time());
        $stmt->bindParam(":status", $reservation->getStatus());
        $stmt->bindParam(":area", $reservation->getArea());

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
        $query = "UPDATE " . $this->table_name . " SET name = :name, user_id = :userId, product_id = :productId, people_qtt = :peopleQtt, reservation_date = :reservationDate, reservation_time = :reservationTime, status = :status, area = :area WHERE reservation_id = :reservationId";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $reservation->getName());
        $stmt->bindParam(":userId", $reservation->getUser_id());
        $stmt->bindParam(":productId", $reservation->getProduct_id());
        $stmt->bindParam(":peopleQtt", $reservation->getPeople_qtt());
        $stmt->bindParam(":reservationDate", $reservation->getReservation_date());
        $stmt->bindParam(":reservationTime", $reservation->getReservation_time());
        $stmt->bindParam(":status", $reservation->getStatus());
        $stmt->bindParam(":area", $reservation->getArea());
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
