<?php

class Horloges
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllHorloges()
    {
        $sql = 'SELECT   H.Id
                        ,H.Merk
                        ,H.Model
                        ,H.Prijs
                        ,H.Materiaal
                        ,H.Gewicht
                        ,H.Releasedatum
                        ,H.Waterdichtheid
                        ,H.HorlogeType 
                        ,DATE_FORMAT(H.Releasedatum, "%d/%m/%Y") as Releasedatum
                FROM Horloges as H

                ORDER BY H.Merk DESC
                        ,H.Model DESC
                        ,H.Prijs DESC
                        ,H.Materiaal DESC
                        ,H.Gewicht DESC
                        ,H.Releasedatum DESC
                        ,H.Waterdichtheid DESC
                        ,H.HorlogeType DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE
                FROM Horloges
                WHERE Id = :Id";
        $this->db->query($sql);

        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    
    }

    public function create($data)
    {
        $sql = "INSERT INTO Horloges   (     Merk
                                            ,Model
                                            ,Prijs
                                            ,Materiaal
                                            ,Gewicht
                                            ,Releasedatum
                                            ,Waterdichtheid
                                            ,HorlogeType

                                            
                                        )
                VALUES (:merk,
                        :model,
                        :prijs,
                        :materiaal,
                        :gewicht,
                        :releasedatum,
                        :waterdichtheid,
                        :horlogetype)";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_INT);
        $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);
        $this->db->bind(':waterdichtheid', $data['waterdichtheid'], PDO::PARAM_INT);
        $this->db->bind(':horlogetype', $data['horlogetype'], PDO::PARAM_STR);

        return $this->db->execute();
    }
    
    public function getHorlogesById($id)
    {
        $sql = 'SELECT   H.Id
                        ,H.Merk
                        ,H.Model
                        ,H.Prijs
                        ,H.Materiaal
                        ,H.Gewicht
                        ,H.Releasedatum
                        ,H.Waterdichtheid
                        ,H.HorlogeType 
                FROM    Horloges as H
                WHERE   H.Id = :id'; 

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();


    }

    public function updateHorloges($request)
    {
        //var_dump($_REQUEST);
        $sql = 'UPDATE Horloges as H
                SET      H.Merk = :merk
                        ,H.Model = :model
                        ,H.Prijs = :prijs
                        ,H.Gewicht = :gewicht
                        ,H.Releasedatum = :releasedatum
                        ,H.Waterdichtheid = :waterdichtheid
                        ,H.HorlogeType = :horlogetype
                WHERE H.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $request['id'], PDO::PARAM_STR);
        $this->db->bind(':merk', $request['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $request['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $request['prijs'], PDO::PARAM_INT);
        $this->db->bind(':gewicht', $request['gewicht'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $request['releasedatum'], PDO::PARAM_STR);
        $this->db->bind(':waterdichtheid', $request['waterdichtheid'], PDO::PARAM_INT);
        $this->db->bind(':horlogetype', $request['horlogetype'], PDO::PARAM_STR);
       

        return $this->db->execute();
    }

    
}