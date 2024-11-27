<?php
    namespace DAO;

    use Entities\Purchase;
    use PDO;

    class PurchaseDAO {
        private $conn;
        private $table_name = "purchase";

        public function __construct($db) {
            $this->conn = $db;
        }

        public function create(Purchase $purchase) {
            $query = "INSERT INTO " . $this->table_name . " (user_id, product_id, quantity, total, delivery_date, delivery_time, status) VALUES (:userId, :productId, :quantity, :total, :deliveryDate, :deliveryTime, :status)";
            $stmt = $this->conn->prepare($query);

            $userId = $purchase->getUser_id();
            $productId = $purchase->getProduct_id();
            $quantity = $purchase->getQuantity();
            $total = $purchase->getTotal();
            $deliveryDate = $purchase->getDelivery_date();
            $deliveryTime = $purchase->getDelivery_time();
            $status = $purchase->getStatus();

            $stmt->bindParam(":userId", $userId);
            $stmt->bindParam(":productId", $productId);
            $stmt->bindParam(":quantity", $quantity);
            $stmt->bindParam(":total", $total);
            $stmt->bindParam(":deliveryDate", $deliveryDate);
            $stmt->bindParam(":deliveryTime", $deliveryTime);
            $stmt->bindParam(":status", $status);

            return $stmt->execute();
        }

        public function read($purchaseId = null) {
            $query = "SELECT * FROM " . $this->table_name;
            if ($purchaseId) {
                $query .= " WHERE purchase_id = :purchaseId";
            }

            $stmt = $this->conn->prepare($query);

            if ($purchaseId) {
                $stmt->bindParam(":purchaseId", $purchased, PDO::PARAM_INT);
            }

            $stmt->execute();
            return $stmt;
        }

        public function delete($purchaseId) {
            $query = "DELETE FROM " . $this->table_name . " WHERE purchaseId = :purchaseId";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":purchaseId", $purchaseId, PDO::PARAM_INT);

            return $stmt->execute();
        }
    }
?>
