<?php

namespace App\ValueObjects;

use InvalidArgumentException;

class LotteryTicket
{
    private string $date;

    private array $ticketNumbers;

    private int $bonusNumber;

    private array $extraNumbers;

    public function __construct($date, $ticketNumbers, $bonusNumber, $extraNumbers = null)
    {
        $this->setDate($date);
        $this->setTicketNumbers($ticketNumbers);
        $this->setBonusNumber($bonusNumber);

        if ($extraNumbers !== null) {
            $this->setExtraNumbers($extraNumbers);
        }
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setTicketNumbers(array $ticketNumbers): void
    {
        if (count($ticketNumbers) !== 6) {
            throw new InvalidArgumentException(
                "\$ticketNumbers should be 6 digits long"
            );
        }

        $this->ticketNumbers = $ticketNumbers;
    }

    public function getTicketNumbers(): array
    {
        return $this->ticketNumbers;
    }

    public function setBonusNumber(int $bonusNumber): void
    {
        $this->bonusNumber = $bonusNumber;
    }

    public function getBonusNumber(): int
    {
        return $this->bonusNumber;
    }

    public function setExtraNumbers(array|int $extraNumbers): void
    {
        if (is_int($extraNumbers)) {
            $extraNumbers = str_split($extraNumbers);
        }

        $this->extraNumbers = $extraNumbers;
    }

    public function getExtraNumbers(): array
    {
        return $this->extraNumbers;
    }
}