<?php

class Client
{
    private string $identifiant;
    private string $nom;
    private string $prenom;
    private DateTime $dateNaissance;
    private string $email;
    private array $compteUser;

    public function __construct(string $identifiant, string $nom, string $prenom, DateTime $dateNaissance, string $email)
    {
        $this->identifiant = $identifiant;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->email = $email;
        $this->compteUser = [];
    }

    /**
     * Get the value of identifiant
     *
     * @return string
     */
    public function getIdentifiant(): string
    {
        return $this->identifiant;
    }

    /**
     * Set the value of identifiant
     *
     * @param string $identifiant
     *
     * @return self
     */
    public function setIdentifiant(string $identifiant): self
    {

        $this->identifiant = $identifiant;

        return $this;
    }

    /**
     * Get the value of nom
     *
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @param string $nom
     *
     * @return self
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     *
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @param string $prenom
     *
     * @return self
     */
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of dateNaissance
     *
     * @return DateTime
     */
    public function getDateNaissance(): DateTime
    {
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @param DateTime $dateNaissance
     *
     * @return self
     */
    public function setDateNaissance(DateTime $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of compteUser
     *
     * @return array
     */
    public function getCompteUser(): array
    {
        return $this->compteUser;
    }


    /**
     * Set the value of compteUser
     *
     * @param array $compteUser
     *
     * @return self
     */
    public function setCompteUser(array $compteUser): self
    {
        $this->compteUser = $compteUser;

        return $this;
    }

    public function addCompte(Compte $newCompte)
    {
        if (count($this->compteUser) <= 2) {
            $this->compteUser[] = $newCompte;
        } else {
            echo "Impossible l'utilisateur possède déjà 3 comptes";
        }
    }

    public function removeCompte(Compte $theCompteToRemove)
    {
        foreach ($this->compteUser as $key => $value) {
            if($value == $theCompteToRemove)
            {
                unset($this->compteUser[$value]);
            }
        }

    }
    public function ShowComptes()
    {
        $tempText = "";
        foreach ($this->compteUser as $key => $value) {
            $tempText .= $value->__toString() . "<br>------------------------<br> ";
        }
        return $tempText;
    }
    public function __toString()
    {
        $tempText = "Fiche client <br>" .
            "Numéro client : " . $this->identifiant . "<br>" .
            "Nom : " . $this->nom . "<br>" .
            "Prénom : " . $this->prenom . "<br>" .
            "Date de Naissance : " . $this->dateNaissance->format("Y-m-d") . "<br><br>" .
            "Liste de compte <br><br>" .
            "Numéro de compte | Solde <br> <br>";

        $tempText .= $this->ShowComptes();

        return $tempText;
    }
}
