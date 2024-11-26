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

        $name = $reservation->getName();
        $userId = $reservation->getUser_id();
        $productId = $reservation->getProduct_id();
        $peopleQtt = $reservation->getPeople_qtt();
        $reservationDate = $reservation->getReservation_date();
        $reservationTime = $reservation->getReservation_time();
        $status = $reservation->getStatus();
        $area = $reservation->getArea();

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":userId", $userId);
        $stmt->bindParam(":productId", $productId);
        $stmt->bindParam(":peopleQtt", $peopleQtt);
        $stmt->bindParam(":reservationDate", $reservationDate);
        $stmt->bindParam(":reservationTime", $reservationTime);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":area", $area);

        
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

        // Armazenar as variáveis em vez de passar diretamente para o bindParam
        $name = $reservation->getName();
        $userId = $reservation->getUser_id();
        $productId = $reservation->getProduct_id();
        $peopleQtt = $reservation->getPeople_qtt();
        $reservationDate = $reservation->getReservation_date();
        $reservationTime = $reservation->getReservation_time();
        $status = $reservation->getStatus();
        $area = $reservation->getArea();
        $reservationId = $reservation->getReservation_id();

        // Passar as variáveis para bindParam
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":userId", $userId);
        $stmt->bindParam(":productId", $productId);
        $stmt->bindParam(":peopleQtt", $peopleQtt);
        $stmt->bindParam(":reservationDate", $reservationDate);
        $stmt->bindParam(":reservationTime", $reservationTime);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":area", $area);
        $stmt->bindParam(":reservationId", $reservationId, PDO::PARAM_INT);

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
