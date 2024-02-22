<?php

class LivretA extends Compte implements IInteret
{
    private int $tauxIntert;
    private int $interet;

    private bool $canDecouvert;

    public function __construct(string $nbCompte, Client $client, int $solde, int $tauxIntert, int $interet, bool $canDecouvert)
    {
        parent::__construct($nbCompte, $client, $solde);
        $this->tauxIntert = $tauxIntert;
        $this->interet = $interet;
        $this->canDecouvert = $canDecouvert;
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
    public function __toString(): string
    {
        return parent::__toString();
    }


    public function Virement(int $montantVirement, Compte $autreCompte)
    {
        if ($this->getSolde() < $montantVirement) {
            if ($this->canDecouvert) {
                return   parent::Virement($montantVirement, $autreCompte);
            } else {
                return   parent::Virement($montantVirement, $autreCompte);
            }
        }
    }

    public function Retrait(float $montantRetrait)
    {
        if ($this->getSolde() < $montantRetrait) {
            if ($this->canDecouvert) {
                return   parent::Retrait($montantRetrait);
            } else {
                return   parent::Retrait($montantRetrait);
            }
        }
    }
    public function CalculeInteret()
    {
        return $this->AlimentationCompte($this->getSolde() * $this->tauxIntert);
    }

    public function getFrais(): float
    {
        return self::$cost + (float)$this->CalculeInteret() * .1;
    }

    /**
     * Get the value of tauxIntert
     *
     * @return int
     */
    public function getTauxIntert(): int
    {
        return $this->tauxIntert;
    }

    /**
     * Set the value of tauxIntert
     *
     * @param int $tauxIntert
     *
     * @return self
     */
    public function setTauxIntert(int $tauxIntert): self
    {
        $this->tauxIntert = $tauxIntert;

        return $this;
    }
}
