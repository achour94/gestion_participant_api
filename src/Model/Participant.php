<?php
namespace App\Model;


class Participant {

    private $id;

    private $nom;

    private $prenom;

    private $email;

    private $dateDeNaissance;

    private $sexe;

    private $situationF;

    private $actif = 1;


    public function getNom (): ?string {
        return $this->nom;
    }

    public function setNom (string $nom): self {
        $this->nom = $nom;
        return $this;
    }
    public function getPrenom (): ?string 
    {
        return $this->prenom;
    }

    public function setPrenom (string $prenom): self {
        $this->prenom = $prenom;
        return $this;
    }

    public function getEmail (): ?string 
    {
        return $this->email;
    }

    public function setEmail (string $email): self {
        $this->email = $email;
        return $this;
    }
    
    public function getDateDeNaissance (): ?string 
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance (string $dateDeNaissance): self {
        $this->dateDeNaissance = $dateDeNaissance;
        return $this;
    }

    public function getSexe (): ?string 
    {
        return $this->sexe;
    }

    public function setSexe (string $sexe): self {
        $this->sexe = $sexe;
        return $this;
    }

    public function getSituationF (): ?string 
    {
        return $this->situationF;
    }

    public function setSituationF (string $situationF): self {
        $this->situationF = $situationF;
        return $this;
    }

    public function getActif (): ?int 
    {
        return $this->actif;
    }

    public function setActif (int $actif): self {
        $this->actif = $actif;
        return $this;
    }
    public function getID (): ?int
    {
        return $this->id;
    }

    public function setID(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    

}