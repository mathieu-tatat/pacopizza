<?php 
require('model/notes.php');

    class NotesController{

//////// le click du button note declenche la methode d'insertion d'une note ////////// 
    public function notes(){
$_SESSION['error'] = "Merci d'avoir déposé une note.";
        if(isset($_POST['button_note']))
        {
            $note= $_POST['note_pizza'];
            $idPizza = $_GET['id_pizza'];
            
            $addNote = new Notes;
            $addNote ->insertNote($note,$idPizza);
            $_SESSION ['error'] ;
            header('Location: #');
            

        }    
    }
}