<?php

class Compte{

    private string $account;
    private float $initialBalance;
    private string $currency;
    private Titulaire $titulaire;

    public function __construct(string $account, float $initialBalance, string $currency, Titulaire $titulaire)
    {
        $this->account = $account;
        $this->initialBalance = $initialBalance;
        $this->currency = $currency;
        $this->titulaire = $titulaire;
        $this->titulaire->addCompte($this);
    }

    public function getAccount(): string {
        return $this->account;
    }

    public function setAccount(string $account): self {
        $this->account = $account;
        return $this;
    }

    public function getInitialBalance(): float {
        return $this->initialBalance;
    }

    public function setInitialBalance(float $initialBalance): self {
        $this->initialBalance = $initialBalance;
        return $this;
    }

    public function getCurrency(): string {
        return $this->currency;
    }

    public function setCurrency(string $currency): self {
        $this->currency = $currency;
        return $this;
    }

    public function getTitulaire(): Titulaire {
        return $this->titulaire;
    }

    public function setTitulaire(Titulaire $titulaire): self {
        $this->titulaire = $titulaire;
        return $this;
    }

    public function addBalance(float $addedBalance){
        $this->initialBalance += $addedBalance;
        return "Le compte ". $this->account." à été crédité de $addedBalance ".$this->currency."<br>Votre solde actuel est de ".$this->initialBalance;
    }

    public function subBalance(float $subtractBalance){
        $this->initialBalance -= $subtractBalance;
        return "Le compte ". $this->account." à été débité de $subtractBalance ". $this->currency."<br>Votre solde actuel est de ".$this->initialBalance;

    }

    public function transferBalace(float $transferBalance, Compte $compteCible){
        if($this !== $compteCible){
            $this->subBalance($transferBalance);
            $compteCible->addBalance($transferBalance);
            return "Le compte ". $this->account." a transferé une somme de $transferBalance au compte $compteCible";
        }else return "Pour faire un virement, choisisez un autre compte";
    }

    public function getInfo(){
        return $this->account." ". $this->initialBalance." ".$this->currency." ".$this->titulaire;
    }

    public function __toString()
    {
        return "N°compte ". $this->account." Solde :".$this-> initialBalance." ".$this->currency;
    }
}