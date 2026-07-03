<?php

class Sneakers
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers()
    {
        $sql = 'SELECT   SKN.Id
                        ,SKN.Merk
                        ,SKN.Model
                        ,SKN.Type
                        ,SKN.Prijs           
                        ,SKN.Materiaal        
                        ,SKN.Gewicht         
                        ,DATE_FORMAT (SKN.Releasedatum, "%d/%m/%Y") as Releasedatum
                        
             
                FROM Sneakers as SKN

                ORDER BY SKN.Merk DESC
                        ,SKN.Model DESC
                        ,SKN.Type DESC
                        ,SKN.Prijs DESC           
                        ,SKN.Materiaal DESC       
                        ,SKN.Gewicht DESC        
                        ,SKN.Releasedatum DESC';
                       

        $this->db->query($sql);

        return $this->db->resultSet();
    }
    
    public function delete($Id)
    {
        $sql = "DELETE
                FROM Sneakers
                WHERE Id = :Id";
        $this->db->query($sql);

        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Sneakers    (    Merk
                                            ,Model
                                            ,Type
                                            ,Prijs
                                            ,Materiaal
                                            ,Gewicht
                                            ,Releasedatum
                                            
                                        )
                VALUES (:merk,
                        :model,
                        :type,
                        :prijs,
                        :materiaal,
                        :gewicht,
                        :releasedatum)";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_INT);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_INT);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }
    
    public function getSneakersId($id)
    {
        $sql = 'SELECT   SKN.Id
                        ,SKN.Merk
                        ,SKN.Model
                        ,SKN.Type
                        ,SKN.Prijs
                        ,SKN.Materiaal
                        ,SKN.Gewicht
                        ,SKN.Releasedatum
                FROM    Sneakers as SKN
                WHERE   SKN.Id = :id'; 

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();


    }
    
    
    public function updateSneakers($request)
    {   //var_dump($_REQUEST);
        $sql = 'UPDATE Sneakers as SKN
                SET     SKN.Merk = :merk,
                        SKN.Model = :model,
                        SKN.Type = :type,
                        SKN.Prijs = :prijs,
                        SKN.Materiaal = :materiaal,
                        SKN.Gewicht = :gewicht,
                        SKN.Releasedatum = :releasedatum
                WHERE SKN.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $request['id'], PDO::PARAM_INT);
        $this->db->bind(':merk', $request['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $request['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $request['type'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $request['prijs'], PDO::PARAM_INT);
        $this->db->bind(':materiaal', $request['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $request['gewicht'], PDO::PARAM_INT);
        $this->db->bind(':releasedatum', $request['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }
  


}