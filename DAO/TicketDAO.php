<?php namespace DAO;

use business\models\Payment;
use business\models\Ticket;

use DAO\Database;

require_once("./config/ENV.php");


class ticketDAO {
    private $ticket = array();

    public function GetAll(){
        $this->ticket = $this->getDBTicket();
        return $this->ticket;
    }

    public function add($ticket){
        Database::connect();
        Database::execute('add_ticket', 'IN', array($ticket->getId_purchase(), $ticket->getId_show(), $ticket->getQr()));
    }

    private function getDBTicket(){
        Database::connect();
        $DBTicket = Database::execute('get_tickets', 'OUT');
        $DBTicket = array_map(function ($ticket){
            return new Ticket(
                $ticket["id_ticket"],
                $ticket["id_purchase"],
                $ticket["id_show"],
                $ticket["qr"]
            );
        }, $DBTicket);

        return $DBTicket;
    }

   
}

?>