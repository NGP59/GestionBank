<?php

class Courant extends Compte
{
    private bool $canDecouvert;
    public function __construct(string $nbCompte, Client $client, int $solde, bool $canDecouvert)
    {
        parent::__construct($nbCompte, $client, $solde);
        $this->canDecouvert = $canDecouvert;
    }

    public function __toString(): string
    {
        return parent::__toString();
    }

    /**
     * Get the value of canDecouvert
     *
     * @return bool
     */
    public function getCanDecouvert(): bool
    {
        return $this->canDecouvert;
    }

    /**
     * Set the value of canDecouvert
     *
     * @param bool $canDecouvert
     *
     * @return self
     */
    public function setCanDecouvert(bool $canDecouvert): self
    {
        $this->canDecouvert = $canDecouvert;

        return $this;
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

    public function getFrais(): float
    {
        $this->Retrait(self::$cost);
        return self::$cost;
    }
}
