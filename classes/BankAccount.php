<?php

class BankAccount implements IfaceBankAccount
{

    private $balance = null;

    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance->value();
    }

    public function balance()
    {
        return $this->balance;
    }

    public function deposit(Money $amount)
    {
        $this->balance += $amount->value();
    }

    public function transfer(Money $amount, BankAccount $account)
    {
	$this->withdraw(new Money($amount->value()));
	$account->deposit(new Money($amount->value()));
    }
    public function withdraw(Money $amount)
    {
	$this->balance -= $amount->value();
    }
}
