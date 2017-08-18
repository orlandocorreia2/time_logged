<?php
class Connection
{
    private $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:dbname=time_logged;host:localhost', 'root', 'root');
    }
    public function getTimeLogged()
    {
        $data = [];
        $now = date('Y-m-d');
        $sql = "SELECT * FROM logged WHERE created_at BETWEEN '$now 00:00:00' AND '$now 23:59:59' ";
        $sql = $this->db->query($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
        }
        return $data;
    }
    public function setTimeLogged($time_logged = false)
    {
        $sql = '';
        if ($time_logged) {
            $data = $this->getTimeLogged();
            if ($data && count($data) > 0) {
                $sql = "UPDATE logged SET time_logged = '".$time_logged."' WHERE id = '".$data['id']."'";
                $sql = $this->db->query($sql);

            } else {
                $now = date('Y-m-d h:i:s');
                $sql = "INSERT INTO logged SET action = 'Ativo no Sistema', created_at = '$now', time_logged = '0'";
                $sql = $this->db->query($sql);
            }
        }

        return $sql;
    }
}


