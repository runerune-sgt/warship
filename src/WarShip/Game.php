<?php

namespace WarShip;
use WarShip\Timer;
use WarShip\Board;

class Game {
	private $shots = [];
	private $timer;
	private $board;

	public function __construct(Timer $timer, Board $board) {
		$this->timer = $timer;
		$this->board = $board;
	}

    public function shoot($x, $y) {
		if(sizeof($this->shots) >= 5) {
			throw new \RuntimeException('too many shots');
		}

		if($this->timer->isTimeOver()) {
			throw new \RuntimeException('time over');
		}

		foreach($this->shots as $shot) {
			if($shot->x === $x && $shot->y === $y) {
				throw new \RuntimeException('cannot shoot same place twice');
			}
		}

		if($this->board->hasShip($x, $y)) {
			return true;
		}

		$shot = new \StdClass();
		$shot->x = $x;
		$shot->y = $y;

		$this->shots[] = $shot;

        return false;
    }

}
