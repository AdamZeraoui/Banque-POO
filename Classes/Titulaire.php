<?php

class Titulaire{

    private string $lastName;
    private string $firstName;
    private DateTime $birth;
    private string $town;
    private array $comptes;

    public function __construct(string $lastName, string $firstName, string $birth, string $town)//, Compte $compte)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->birth = new DateTime($birth);
        $this->town = $town;
        $this->comptes=[];
    }

    public function getLastName(): string {
        return $this->lastName;
    }


    public function setLastName(string $lastName): self {
        $this->lastName = $lastName;
        return $this;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }


    public function setFirstName(string $firstName): self {
        $this->firstName = $firstName;
        return $this;
    }

    public function getTown(): string {
        return $this->town;
    }

    public function getBirth(): DateTime {
        return $this->birth;
    }


    public function setBirth(string $birth): self {
        $this->birth = new DateTime($birth);
        return $this;
    }

    public function setTown(string $town): self {
        $this->town = $town;
        return $this;
    }

    public function getComptes(): array {
        return $this->comptes;
    }

    public function setComptes(array $comptes): self {
        $this->comptes = $comptes;
        return $this;
    }

    public function addCompte(Compte $compte) {
        return $this->comptes[]= $compte;
    }

    public function showAllComptes(){
        $result = "<h2>Comptes de $this :</h2>". $this->getId() ."<br><ul>";
        foreach($this->comptes as $compte){
            $result.= "<li>$compte</li>";
        }
        $result.="</ul>";
        return $result;
    }

    public function calculateAge(){
        $toDay = new DateTime();
        $difference = $this->birth->diff($toDay);
        return $difference->y;
    }

    public function getId(){
        return $this->lastName." ".$this->firstName." ". $this->calculateAge()." ans (".$this->birth->format("Y-m-d").") ".$this->town;
    }

    public function __toString()
    {
        return $this->lastName." ".$this->firstName;
    }


}