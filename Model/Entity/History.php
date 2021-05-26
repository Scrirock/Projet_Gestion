<?php

namespace Model\Entity;

class History{

    private ?int $id;
    private ?string $date;
    private ?int $difference;
    private ?string $historyProductName;

    /**
     * History constructor.
     * @param string|null $date
     * @param int|null $difference
     * @param string|null $historyProductName
     * @param int|null $id
     */
    public function __construct(?string $date=null, ?int $difference=null, ?string $historyProductName=null, ?int $id=null){
        $this->id = $id;
        $this->date = $date;
        $this->difference = $difference;
        $this->historyProductName = $historyProductName;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int{
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void{
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string{
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): void{
        $this->date = $date;
    }

    /**
     * @return string|null
     */
    public function getDifference(): ?string{
        return $this->difference;
    }

    /**
     * @param string|null $difference
     */
    public function setDifference(?string $difference): void{
        $this->difference = $difference;
    }

    /**
     * @return string|null
     */
    public function getHistoryProductName(): ?string{
        return $this->historyProductName;
    }

    /**
     * @param string|null $historyProductName
     */
    public function setHistoryProductName(?string $historyProductName): void{
        $this->historyProductName = $historyProductName;
    }


}