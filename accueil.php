    <?php 
    
    $comments = new ComController;
    $commentaires = new Commentaire;
    $com = $commentaires->selectInfoCom();
    
?>
    
    <div style="display: flex;align-items: center;">
    <h3 class="note_generale">Etablissement noté: 4,6 <img src="assets/Star1.png"> /5 </h3>
        <img class="labelLogo"src="assets/SFlabel.png" alt="">
        
    </div>
    
        <h3 class="positionAvis">Avis clients :</h3>
        <div class="box_avis">
            <?php foreach($com as $comment){ ?>
                <div class="box_avis_msg">
                    <p class="nom_date"><?= $comment['user']?> le <?= $comment['date']?> </p>
                    <p class="msg_avis"><?= $comment['msg']?> </p>
                </div>
            <?php } ?>
           
        </div>
        
        <div class="com_avis_generale">
            <form action=""  method="POST" class="form_generale">
                <label>Donner votre avis sur notre etablissement:</label>
                <textarea class="textearea_generale" name="com_general" cols="30" rows="2" placeholder="Déposer votre avis ici ..."></textarea>
               <?php if(isset($_SESSION['user'])){
                    echo"<input type='submit' value='Déposer' name='button_com'>";
               }else{
                   echo"Vous devez etre connecté pour laisser un commentaire";
               }?>
               
                <?= $comments->commenter();?>
            </form>


        </div>
