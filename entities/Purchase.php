<?php
    namespace Entities;

    class Purchase {
        private $purchase_id;
        private $user_id;
        private $product_id;
        private $quantity;
        private $total;
        private $delivery_date;
        private $delivery_time;
        private $status;
        
        public function getPurchase_id() {
            return $this->purchase_id;
        }

        public function setPurchase_id($purchase_id) {
            $this->purchase_id = $purchase_id;
        }
        
        public function getUser_id() {
            return $this->user_id;
        }

        public function setUser_id($user_id) {
            $this->user_id = $user_id;
        }

        public function getProduct_id() {
            return $this->product_id;
        }

        public function setProduct_id($product_id) {
            $this->product_id = $product_id;
        }

        public function getQuantity() {
            return $this->quantity;
        }

        public function setQuantity($quantity) {
            $this->quantity = $quantity;
        }

        public function getTotal() {
            return $this->total;
        }

        public function setTotal($total) {
            $this->total = $total;
        }

        public function getDelivery_date() {
            return $this->delivery_date;
        }

        public function setDelivery_date($delivery_date) {
            $this->delivery_date = $delivery_date;
        }

        public function getDelivery_time() {
            return $this->delivery_time;
        }

        public function setDelivery_time($delivery_time) {
            $this->delivery_time = $delivery_time;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

    }
?>