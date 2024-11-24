<?php
    namespace Entities;

    class Reservation {
        private $reservation_id;
        private $user_id;
        private $product_id;
        private $reservation_date;
        private $status;

        public function getReservation_id() {
            return $this->reservation_id;
        }

        public function setReservation_id($reservation_id) {
            $this->reservation_id = $reservation_id;
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

        public function getReservation_date() {
            return $this->reservation_date;
        }

        public function setReservation_date($reservation_date) {
            $this->reservation_date = $reservation_date;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }
    }
?>
