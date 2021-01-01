<?php
require_once('D:\wamp64\www\Novid-Health\config.php');

class BenevoleController
{
    public function afficherBenevole()
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM benevole'
            );
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function searchBenevole()
    {
        try {
            $pdo = getConnexion();

            $search = $_POST["search"];
            $query = $pdo->prepare(
                "SELECT * FROM benevole WHERE reference LIKE '%" . $search . "%'"
            );
            $query->execute();
            return $query->fetchAll();

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getBenevoleById($id)
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM benevole WHERE id = :id'
            );
            $query->execute([
                'id' => $id
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function addBenevole($benevole)
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'INSERT INTO benevole (reference, description, date_debut,date_fin) 
                VALUES (:reference, :description, :date_debut, :date_fin)'
            );
            $query->execute([
                'reference' => $benevole->getReference(),
                'description' => $benevole->getDescription(),
                'date_debut' => $benevole->getDateDebut()->format('Y-m-d'),
                'date_fin' => $benevole->getDateFin()->format('Y-m-d')
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function updateBenevole($benevole, $id)
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'UPDATE benevole SET reference = :reference, description = :description, date_debut = :date_debut, date_fin = :date_fin WHERE id = :id'
            );
            $query->execute([
                'reference' => $benevole->getReference(),
                'description' => $benevole->getDescription(),
                'date_debut' => $benevole->getDateDebut()->format('Y-m-d'),
                'date_fin' => $benevole->getDateFin()->format('Y-m-d'),
                'id' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function deleteBenevole($id)
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'DELETE FROM benevole WHERE id= :id'
            );
            $query->execute([
                'id' => $id
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}