<?php

class PEL extends Compte implements IInteret
{
    private int $fraisCompte;
    private int $interet;


    public function __construct(string $nbCompte, Client $client, int $solde, int $fraisCompte, int $interet)
    {
        parent::__construct($nbCompte, $client, $solde);
        $this->fraisCompte = $fraisCompte;
        $this->interet = $interet;
    }

    public function FraisTenuCompteAnnuel()
    {
        return $this->setSolde($this->getSolde() + (2.5 / 100));
    }

    /**
     * Get the value of fraisCompte
     *
     * @return int
     */
    public function getFraisCompte(): int
    {
        return $this->fraisCompte;
    }

    /**
     * Set the value of fraisCompte
     *
     * @param int $fraisCompte
     *
     * @return self
     */
    public function setFraisCompte(int $fraisCompte): self
    {
        $this->fraisCompte = $fraisCompte;

        return $this;
    }
    public function __toString(): string
    {
        return parent::__toString();
    }
    public function Virement(int $montantVirement, Compte $autreCompte)
    {
        if ($this->getSolde() < $montantVirement) {
            return   parent::Virement($montantVirement, $autreCompte);
        }
    }

    public function Retrait(float $montantRetrait)
    {
        if ($this->getSolde() < $montantRetrait) {
            return   parent::Retrait($montantRetrait);
        }
    }

    public function CalculeInteret()
    {
        return $this->AlimentationCompte($this->getSolde() * $this->interet);
    }

    public function getFrais(): float
    {
        $tempCost = self::$cost + (float)$this->CalculeInteret() * (2.5 / 100);
        return $tempCost;
    }

    /**
     * Get the value of interet
     *
     * @return int
     */
    public function getInteret(): int
    {
        return $this->interet;
    }

    /**
     * Set the value of interet
     *
     * @param int $interet
     *
     * @return self
     */
    public function setInteret(int $interet): self
    {
        $this->interet = $interet;

        return $this;
    }
}
