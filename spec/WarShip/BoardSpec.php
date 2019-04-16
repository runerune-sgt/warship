<?php

namespace spec\WarShip;

use WarShip\Board;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BoardSpec extends ObjectBehavior {
	function let(Board $board) {
		$this->beConstructedWith(4, 4, 2, 1);
	}

    function it_is_initializable() {
        $this->shouldHaveType(Board::class);
	}

	function it_should_check_if_position_valid() {
		$this->positionValid(0, 0)->shouldReturn(true);
		$this->positionValid(4, 4)->shouldReturn(true);
		$this->positionValid(0, -1)->shouldReturn(false);
		$this->positionValid(-1, 0)->shouldReturn(false);
		$this->positionValid(5, 5)->shouldReturn(false);
	}

	function it_should_tell_if_position_has_ship() {
		$this->hasShip(2, 1)->shouldReturn(true);

		$this->hasShip(2, 3)->shouldReturn(false);
		$this->hasShip(4, 0)->shouldReturn(false);
		$this->hasShip(4, 4)->shouldReturn(false);
	}


}