<?php


class Benevole
{
    private ?int $id = null;
    private string $reference;
    private string $description;
    private DateTime $date_debut;
    private DateTime $date_fin;

    /**
     * Benevole constructor.
     * @param string $reference
     * @param string $description
     * @param DateTime $date_debut
     * @param DateTime $date_fin
     */
    public function __construct(string $reference, string $description, DateTime $date_debut, DateTime $date_fin)
    {
        $this->reference = $reference;
        $this->description = $description;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return DateTime
     */
    public function getDateDebut(): DateTime
    {
        return $this->date_debut;
    }

    /**
     * @param DateTime $date_debut
     */
    public function setDateDebut(DateTime $date_debut): void
    {
        $this->date_debut = $date_debut;
    }

    /**
     * @return DateTime
     */
    public function getDateFin(): DateTime
    {
        return $this->date_fin;
    }

    /**
     * @param DateTime $date_fin
     */
    public function setDateFin(DateTime $date_fin): void
    {
        $this->date_fin = $date_fin;
    }

}