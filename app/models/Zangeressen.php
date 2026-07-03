<?php

class Zangeressen
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllZangeressen()
    {
        $sql = 'SELECT   Id
                        ,Naam
                        ,Vermogen
                        ,Land
                        ,Leeftijd
                        ,BekendsteNummer
                        ,Debuutjaar
                        ,DATE_FORMAT (Debuutjaar, "%d/%m/%Y") as Debuutjaar
                FROM    Zangeressen
                ORDER BY Naam ASC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE
                FROM Zangeressen
                WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }
    
    public function create($data)
    {
        $sql = "INSERT INTO Zangeressen 
                    (Naam
                    ,Vermogen
                    ,Land
                    ,Leeftijd
                    ,BekendsteNummer
                    ,Debuutjaar)
                VALUES 
                    (:naam
                    ,:vermogen
                    ,:land
                    ,:leeftijd
                    ,:bekendstenummer
                    ,:debuutjaar)";

        $this->db->query($sql);
        $this->db->bind(':naam', $data['naam'], PDO::PARAM_STR);
        $this->db->bind(':vermogen', $data['vermogen'], PDO::PARAM_STR);
        $this->db->bind(':land', $data['land'], PDO::PARAM_STR);
        $this->db->bind(':leeftijd', $data['leeftijd'], PDO::PARAM_INT);
        $this->db->bind(':bekendstenummer', $data['bekendstenummer'], PDO::PARAM_STR);
        $this->db->bind(':debuutjaar', $data['debuutjaar'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function getZangeresById($id)
    {
        $sql = 'SELECT   Id
                        ,Naam
                        ,Vermogen
                        ,Land
                        ,Leeftijd
                        ,BekendsteNummer
                        ,Debuutjaar
                FROM    Zangeressen
                WHERE   Id = :id'; 

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateZangeres($request)
    {
        $sql = 'UPDATE Zangeressen
                SET     Naam = :naam
                       ,Vermogen = :vermogen
                       ,Land = :land
                       ,Leeftijd = :leeftijd
                       ,BekendsteNummer = :bekendstenummer
                       ,Debuutjaar = :debuutjaar
                WHERE Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $request['id'], PDO::PARAM_INT);
        $this->db->bind(':naam', $request['naam'], PDO::PARAM_STR);
        $this->db->bind(':vermogen', $request['vermogen'], PDO::PARAM_STR);
        $this->db->bind(':land', $request['land'], PDO::PARAM_STR);
        $this->db->bind(':leeftijd', $request['leeftijd'], PDO::PARAM_INT);
        $this->db->bind(':bekendstenummer', $request['bekendstenummer'], PDO::PARAM_STR);
        $this->db->bind(':debuutjaar', $request['debuutjaar'], PDO::PARAM_STR);

        return $this->db->execute();
    }
}