<?php
    namespace DAO;

    use Entities\Product;
    use PDO;

    class ProductDAO {
        private $conn;
        private $table_name = "products";

        public function __construct($db) {
            $this->conn = $db;
        }

        public function create(Product $product) {
            $query = "INSERT INTO " . $this->table_name . " (name, description, price, image) VALUES (:name, :description, :price, :image)";
            $stmt = $this->conn->prepare($query);

            $name = $product->getName();
            $description = $product->getDescription();
            $price = $product->getPrice();
            $image = $product->getImage();

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":image", $image);

            return $stmt->execute();
        }

        public function read($productId = null) {
            $query = "SELECT * FROM " . $this->table_name;
            if ($productId) {
                $query .= " WHERE product_id = :productId";
            }

            $stmt = $this->conn->prepare($query);

            if ($productId) {
                $stmt->bindParam(":productId", $productId, PDO::PARAM_INT);
            }

            $stmt->execute();
            return $stmt;
        }

        public function update(Product $product) {
            $query = "UPDATE " . $this->table_name . " SET name = :name, description = :description, price = :price, image = :image WHERE product_id = :productId";
            $stmt = $this->conn->prepare($query);

            $name = $product->getName();
            $description = $product->getDescription();
            $price = $product->getPrice();
            $image = $product->getImage();
            $productId = $product->getProduct_id();

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":image", $image);
            $stmt->bindParam(":productId", $productId, PDO::PARAM_INT);

            return $stmt->execute();
        }

        public function delete($productId) {
            $query = "DELETE FROM " . $this->table_name . " WHERE product_id = :productId";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":productId", $productId, PDO::PARAM_INT);

            return $stmt->execute();
        }
    }
?>
