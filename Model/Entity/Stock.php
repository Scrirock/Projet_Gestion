<?php


namespace Model\Entity;


class Stock{

    private ?int $stock;
    private ?string $name;
    private ?int $stockMin;
    private ?string $reference;
    private ?string $category;
    private ?string $description;
    private ?string $condition;
    private ?string $provider;
    private ?string $location;
    private ?string $location2;
    private ?int $id;

    /**
     * Stock constructor.
     * @param int|null $stock
     * @param string|null $name
     * @param int|null $stockMin
     * @param string|null $reference
     * @param string|null $category
     * @param string|null $description
     * @param string|null $condition
     * @param string|null $provider
     * @param string|null $location
     * @param string|null $location2
     * @param int|null $id
     */
    public function __construct(?int $stock=null, ?string $name=null, ?int $stockMin=null, ?string $reference=null, ?string $category=null, ?string $description=null, ?string $condition=null, ?string $provider=null, ?string $location=null, ?string $location2=null, ?int $id=null){
        $this->id = $id;
        $this->name = $name;
        $this->reference = $reference;
        $this->category = $category;
        $this->description = $description;
        $this->condition = $condition;
        $this->provider = $provider;
        $this->location = $location;
        $this->location2 = $location2;
        $this->stock = $stock;
        $this->stockMin = $stockMin;
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
    public function getName(): ?string{
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void{
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string{
        return $this->reference;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): void{
        $this->reference = $reference;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string{
        return $this->category;
    }

    /**
     * @param string|null $category
     */
    public function setCategory(?string $category): void{
        $this->category = $category;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string{
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void{
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getCondition(): ?string{
        return $this->condition;
    }

    /**
     * @param string|null $condition
     */
    public function setCondition(?string $condition): void{
        $this->condition = $condition;
    }

    /**
     * @return string|null
     */
    public function getProvider(): ?string{
        return $this->provider;
    }

    /**
     * @param string|null $provider
     */
    public function setProvider(?string $provider): void{
        $this->provider = $provider;
    }

    /**
     * @return string|null
     */
    public function getLocation(): ?string{
        return $this->location;
    }

    /**
     * @param string|null $location
     */
    public function setLocation(?string $location): void{
        $this->location = $location;
    }

    /**
     * @return string|null
     */
    public function getLocation2(): ?string{
        return $this->location2;
    }

    /**
     * @param string|null $location2
     */
    public function setLocation2(?string $location2): void{
        $this->location2 = $location2;
    }

    /**
     * @return int|null
     */
    public function getStock(): ?int{
        return $this->stock;
    }

    /**
     * @param int|null $stock
     */
    public function setStock(?int $stock): void{
        $this->stock = $stock;
    }

    /**
     * @return int|null
     */
    public function getStockMin(): ?int{
        return $this->stockMin;
    }

    /**
     * @param int|null $stockMin
     */
    public function setStockMin(?int $stockMin): void{
        $this->stockMin = $stockMin;
    }

}