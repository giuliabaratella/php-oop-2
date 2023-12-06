<?php
trait Discount {
    public int $discount;
    public function setDiscount($perc) {
        $this->discount = $perc;
    }
    public function getDiscount() {
        return $this->discount;
    }
}
?>