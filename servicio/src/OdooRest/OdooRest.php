<?php
namespace OdooRest;
use Ripcord\Ripcord as RipCord;


class OdooRest
{
    private $urlServer = 'http://127.0.0.1:8069/start';
    private $url = "";
    private $db = "";
    private $username = "admin";
    private $password = "";

    public function __construct($url,$db,$username,$password)
    {
        $this->url = $url;
        $this->db = $db;
        $this->username = $username;
        $this->password = $password;
    }

    public function test(){
        $info = RipCord::client($this->urlServer)->start();
        list($this->url, $this->db, $this->username, $this->password) =
            array($info['host'], $info['database'], $info['user'], $info['password']);
        echo $info;

    }

}