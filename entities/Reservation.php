<?php
    namespace Entities;

    class Reservation {
        private $reservation_id;
        private $name;
        private $user_id;
        private $product_id;
        private $people_qtt;
        private $reservation_date;
        private $reservation_time;
        private $status;
        private $area;

        public function getReservation_id() {
            return $this->reservation_id;
        }

        public function setReservation_id($reservation_id) {
            $this->reservation_id = $reservation_id;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
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

        public function getPeople_qtt() {
            return $this->people_qtt;
        }

        public function setPeople_qtt($people_qtt) {
            $this->people_qtt = $people_qtt;
        }

        public function getReservation_date() {
            return $this->reservation_date;
        }

        public function setReservation_date($reservation_date) {
            $this->reservation_date = $reservation_date;
        }

        public function getReservation_time() {
            return $this->reservation_time;
        }

        public function setReservation_time($reservation_time) {
            $this->reservation_time = $reservation_time;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getArea() {
            return $this->area;
        }

        public function setArea($area) {
            $this->area = $area;
        }
    }
?>
