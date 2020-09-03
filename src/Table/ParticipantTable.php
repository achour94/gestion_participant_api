<?php 
namespace App\Table;

use App\Model\Participant;
use Exception;
use PDO;

final class ParticipantTable extends Table {

    protected $table = "participant";
    protected $class = Participant::class;


    public function updateParticipant(Participant $participant)
    {
        $ok = $this->update([
            'nom' => $participant->getNom(),
            'prenom' => $participant->getPrenom(),
            'email' => $participant->getEmail(),
            'dateDeNaissance' => $participant->getDateDeNaissance(),
            'sexe' => $participant->getSexe(),
            'situationF' => $participant ->getSituationF(),
            'actif' => $participant->getActif()
        ], $participant->getID());
        if ($ok) {
            echo json_encode(
                array("message"=>"Participant was updated.")
            );
        } else {
            echo json_encode(
                array("message"=>"Unable to update participant.")
            );
        }
    }

    public function deleteParticipant(int $id)
    {
        $ok = $this->update([
            'actif' => 0
        ], $id);
        if ($ok) {
            echo json_encode(
                array("message"=>true)
            );
        } else {
            echo json_encode(
                array("message"=>false)
            );
        }
        
    }

    public function createParticipant (Participant $participant): void
    {
        $id = $this->create([
            'nom' => $participant->getNom(),
            'prenom' => $participant->getPrenom(),
            'email' => $participant->getEmail(),
            'dateDeNaissance' => $participant->getDateDeNaissance(),
            'sexe' => $participant->getSexe(),
            'situationF' => $participant ->getSituationF()
            ]);
        $participant->setID($id);
    }


    public function delete (int $id): void
    {
    $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
    $ok = $query->execute([$id]);
    if ($ok === false) {
        throw new Exception("Impossible de supprimer l'enregistement $id dans la table {$this->table}");
    }
    }

    
}