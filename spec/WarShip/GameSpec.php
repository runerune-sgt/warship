<?php

namespace spec\WarShip;

use WarShip\Game;
use WarShip\Timer;
use WarShip\Board;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameSpec extends ObjectBehavior {
	function let(Timer $timer, Board $board) {
		$timer->isTimeOver()->willReturn(false);

		$this->beConstructedWith($timer, $board);
	}

    function it_is_initializable() {
        $this->shouldHaveType(Game::class);
	}

	function it_should_take_a_shot_and_not_win() {
		$this->shoot(0, 0)->shouldReturn(false);
	}

	function it_should_limit_shots_to_five_max() {
		$this->shoot(0, 0);
		$this->shoot(0, 1);
		$this->shoot(0, 2);
		$this->shoot(0, 3);
		$this->shoot(0, 4);

		$this->shouldThrow(\RuntimeException::class)->during('shoot', [1, 1]);
	}

	function it_should_not_allow_shooting_same_position() {
		$this->shoot(0, 0);

		$this->shouldThrow(new \RuntimeException('cannot shoot same place twice'))->during('shoot', [0, 0]);
	}

	function it_should_prevet_shot_after_time_over(Timer $timer) {
		$timer->isTimeOver()->willReturn(true);

		$this->shouldThrow(new \RuntimeException('time over'))->during('shoot', [0, 0]);
	}
}