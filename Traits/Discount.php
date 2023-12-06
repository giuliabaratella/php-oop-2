<?php
trait Discount {
    public int $discount;
    public function setDiscount($perc) {
        if($perc < 5 || $perc > 90) {
            throw new Exception("percentage out of range");
        } else {
            $this->discount = $perc;
        }
    }
    public function getDiscount() {
        return $this->discount;
    }
}
?>