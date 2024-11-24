<?php
    namespace Entities;

    class Product {
        private $product_id;
        private $name;
        private $description;
        private $price;
        private $image;

        public function getProduct_id() {
            return $this->productId;
        }

        public function setProduct_d($productId) {
            $this->productId = $productId;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getDescription() {
            return $this->description;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function getPrice() {
            return $this->price;
        }

        public function setPrice($price) {
            $this->price = $price;
        }

        public function getImage() {
            return $this->image;
        }

        public function setImage($image) {
            $this->image = $image;
        }
    }
?>
