<?php
require_once('D:\wamp64\www\Novid-Health\config.php');

class ActualiteController
{
    public function afficherActualite()
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM actualite'
            );
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getActauliteById($id)
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM actualite WHERE id = :id'
            );
            $query->execute([
                'id' => $id
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function addActualite($actualite)
    {
        try {
            $pdo = getConnexion();
            $this->uploadImage();
            $query = $pdo->prepare(
                'INSERT INTO actualite (titre, description, image) 
                VALUES (:titre, :description, :image)'
            );
            $query->execute([
                'titre' => $actualite->getTitre(),
                'description' => $actualite->getDescription(),
                'image' => $actualite->getImage()
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function updateActualite($actualite,$id)
    {
        try {
            $pdo = getConnexion();
            if ($_FILES['image']['name'] !==""){
                $this->uploadImage();
                $query = $pdo->prepare(
                    'UPDATE actualite SET titre = :titre, description = :description, image = :image WHERE id = :id'
                );
                $query->execute([
                    'titre' => $actualite->getTitre(),
                    'description' => $actualite->getDescription(),
                    'image' => $_FILES['image']['name'],
                    'id' => $id
                ]);
            }else{
                $query = $pdo->prepare(
                    'UPDATE actualite SET titre = :titre, description = :description, image = :image WHERE id = :id'
                );
               $query->execute([
                    'titre' => $actualite->getTitre(),
                    'description' => $actualite->getDescription(),
                    'image' => $actualite->getImage(),
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function deleteActualite($id)
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'DELETE FROM actualite WHERE id= :id'
            );
            $query->execute([
                'id' => $id
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function uploadImage(){
        $file = $_FILES['image'];

        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];
        $fileType = $_FILES['image']['type'];
        $fileExt = explode('.',$fileName);
        $fileActExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');
        if (in_array($fileActExt,$allowed)){
            if($fileError === 0){
                if ($fileSize < 1000000){
                    $fileDestination = 'D:\\wamp64\\www\\Novid-Health\\Views\\Back\\assets\\uploads\\'.$fileName;
                    move_uploaded_file($fileTmpName,$fileDestination);
                }else{
                    var_dump ("File Size is too Big!");exit(0);
                }
            }else{
                var_dump ("Error Upload");exit(0);
            }
        }else{
            var_dump ("You cannot upload files of this type!");exit(0);
        }


    }

}