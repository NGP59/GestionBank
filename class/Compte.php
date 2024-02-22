<?php

abstract class Compte
{
    private string $nbCompte;
    private Client $client;
    private int $solde;
    public static int $cost = 25;

    public function __construct(string $nbCompte, Client $client, int $solde)
    {
        $this->nbCompte = $nbCompte;
        $this->client = $client;
        $this->solde = $solde;
    }
    /**
     * Get the value of nbCompte
     *
     * @return string
     */
    public function getNbCompte(): string
    {
        return $this->nbCompte;
    }

    /**
     * Set the value of nbCompte
     *
     * @param string $nbCompte
     *
     * @return self
     */
    public function setNbCompte(string $nbCompte): self
    {
        if (strlen($nbCompte) == 11) {
            $this->nbCompte = $nbCompte;
        }
        return $this;
    }

    /**
     * Get the value of client
     *
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Set the value of client
     *
     * @param Client $client
     *
     * @return self
     */
    public function setClient(Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get the value of solde
     *
     * @return int
     */
    public function getSolde(): int
    {
        return $this->solde;
    }

    /**
     * Set the value of solde
     *
     * @param int $solde
     *
     * @return self
     */
    public function setSolde(int $solde): self
    {
        $this->solde = $solde;

        return $this;
    }
    public function Retrait(float $montantRetrait)
    {
        $this->solde -= $montantRetrait;
    }

    public function AlimentationCompte(int $montantAlimentation)
    {
        $this->solde = $this->solde + $montantAlimentation;
        echo "votre nouveau solde de compte est de :" . $this->solde . "<br>";
    }

    public function Virement(int $montantVirement, Compte $autreCompte)
    {
        $this->solde -= $montantVirement;
        $autreCompte->setSolde($montantVirement);
        echo "Votre solde actuel est :" . $this->solde . " vous avez bien envoyé :" . $montantVirement . " € a l'autre compte <br>";
    }

    public function __toString(): string
    {
        $tempText = $this->nbCompte . " | " . $this->solde . "€ ";
        if ($this->getSolde() <= 0) {
            $tempText .=  " :-(";
        } else {
            $tempText .= " :-)";
        }
        return $tempText;
    }

    abstract public function getFrais():float;
}
