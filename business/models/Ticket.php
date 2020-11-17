<?php

namespace business\models;

class Ticket {
    private $id;
    private $id_purchase;
    private $id_show;
    private $qr;
    
    
    public function __construct($id, $id_purchase, $id_show, $qr) {
        $this->id = $id;
        $this->id_purchase = $id_purchase;
        $this->id_show = $id_show;
        $this->qr = $qr;
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
    }
    
    public function getId_show(){
		return $this->id_show;
	}

	public function setId_show($id_show){
		$this->id_show = $id_show;
	}

	public function getId_purchase(){
		return $this->id_purchase;
	}

	public function setId_purchase($id_purchase){
		$this->id_purchase = $id_purchase;
	}

	public function getQr(){
		return $this->qr;
	}

	public function setQr($qr){
		$this->qr = $qr;
	}

	public function amountFromShow($tickets, $id) {
		$c = 0;
		
		foreach ($tickets as $ticket) {
			if ($ticket->getId_show() == $id)
				$c++;
		}

		return $c;
	}
}