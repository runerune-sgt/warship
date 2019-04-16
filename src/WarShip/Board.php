<?php

namespace WarShip;

class Board {
	private $max_x;
	private $max_y;

	private $ship_x;
	private $ship_y;

	public function __construct($max_x, $max_y, $ship_x, $ship_y) {
		$this->max_x = $max_x;
		$this->max_y = $max_y;

		$this->ship_x = $ship_x;
		$this->ship_y = $ship_y;
	}

    public function positionValid($x, $y) {
		return ($x >= 0 && $x <= $this->max_x && $y >= 0 && $y <= $this->max_y);
    }

    public function hasShip($x, $y) {
        return $x === $this->ship_x && $y === $this->ship_y;
    }
}
