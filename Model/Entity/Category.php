<?php


namespace Model\Entity;


class Category{

    private ?int $id;
    private ?string $name;

    /**
     * Category constructor.
     * @param string|null $name
     * @param int|null $id
     */
    public function __construct(?string $name=null, ?int $id=null){
        $this->id = $id;
        $this->name = $name;
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

}