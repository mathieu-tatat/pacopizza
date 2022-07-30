<?php $title = "Mzntions Légales" ?>
<?php session_start();?>
<?php require_once('controller/pizza_controller.php');?>
<?php ob_start(); ?>
<?php 
   
    
    $test = new PizzaController;
    $pizza = new Pizza;
    $link= $pizza->selectInfoPizza();?>
    


    <div class="background_admin">
<div> 
    
<h2 class="titre_admin">Mentions Légales</h2>
    <form method="POST" class="form_mentions" enctype="multipart/form-data">
    <p>       
    Rappel de la loi</br></br></br>

La LOI n°2004-575 du 21 juin 2004 pour la confiance dans l’économie numérique précise :</br></br>

    1. Les personnes dont l’activité est d’éditer un service de communication au public en ligne mettent à disposition du public, dans un standard ouvert :</br></br>
    a) S’il s’agit de personnes physiques, leurs nom, prénoms, domicile et numéro de téléphone et, si elles sont assujetties aux formalités d’inscription au registre du commerce et des sociétés ou au répertoire des métiers, le numéro de leur inscription ;</br></br>
    b) S’il s’agit de personnes morales, leur dénomination ou leur raison sociale et leur siège social, leur numéro de téléphone et, s’il s’agit d’entreprises assujetties aux formalités d’inscription au registre du commerce et des sociétés ou au répertoire des métiers, le numéro de leur inscription, leur capital social, l’adresse de leur siège social ;</br></br>
    c) Le nom du directeur ou du codirecteur de la publication et, le cas échéant, celui du responsable de la rédaction au sens de l’article 93-2 de la loi n° 82-652 du 29 juillet 1982 précitée ;</br></br>
    d) Le nom, la dénomination ou la raison sociale et l’adresse et le numéro de téléphone du prestataire mentionné au 2 du I.</br></br>

    2. Les personnes éditant à titre non professionnel un service de communication au public en ligne peuvent ne tenir à la disposition du public, pour préserver leur anonymat, que le nom, la dénomination ou la raison sociale et l’adresse du prestataire mentionné au 2 du I, sous réserve de lui avoir communiqué les éléments d’identification personnelle prévus au 1.</br>

La déclaration à la CNIL</br></br>

L’objectif de la CNIL est de veiller à ce que les entreprises respectent les libertés individuelles et publiques de leurs utilisateurs. Cependant, depuis la mise en application de la nouvelle réglementation le 25 mai 2018, la quasi-totalité des formalités déclaratives auprès de la CNIL est supprimé, seules celles liées au domaine de la santé où des activités en lien avec l’Etat restent obligatoire. A présent, vous devez vous concentrer sur le respect des obligations de fond (finalité, droit des personnes, durée de conservation…).</br></br>

Vous devez faire attention à bien actualiser vos mentions légales car tout manquement peut entraîner des poursuites judiciaires</br>
Dans le cas où vous ne déclarez pas ou ne publiez pas vos mentions légales, une sanction sera appliquée. La loi prévoit une peine maximale d’un an de prison et de 75 000 euros d’amende pour les personnes physiques et 375 000 euros d’amende pour les personnes morales.</br>
Les mentions légales</br></br>

Liste des obligations à ajouter dans une page « mentions légales » :</br></br>

    Sites Institutionnels (entreprises, association, ...)</br>
    Personne Physique (particulier)</br>
    E-commerce</br></br>

Un site édité par une entreprise ou association (personne morale) se doit de faire figurer plusieurs informations obligatoires :</br></br>

    Dénomination ou raison sociale,</br>
    Siège social</br>
    Numéro de téléphone,</br>
    Nom du responsable de la rédaction du site</br>
    Nom du directeur de la publication</br>
    Adresse email de contact</br></br>

Et s’il y a lieu :</br></br>

    Structure juridique</br>
    Capital social (si structure sociale)</br>
    Numéro de SIREN, TVA et APE</br></br>

Dans le cas d'une profession réglementée :</br>
Référence aux règles professionnelles applicables et au titre professionnel</br>
Hébergement</br>
Il est impératif d’ajouter à la page des mentions légales, quel que soit le statut (particulier ou entreprise), les informations relatives à l’hébergement du site :</br></br>

    Nom de l’hébergeur,</br>
    Raison sociale,</br>
    Adresse</br>
    Numéro de téléphone</br>

L’hébergement personnel devra être précisé, s’il y a lieu.</br>
Obligations liées à la transparence de l'information</br></br>

    Coordonnées du délégué à la protection des données de l'organisme ou d’un point de contact pour toute question au sujet de la protection de données personnelles</br>
    Finalité poursuivie par le traitement de données</br>
    Caractère obligatoire ou facultatif des réponses et les conséquences éventuelles pour l’internaute dans le cas d’un défaut de réponse</br>
    Destinataires ou catégories de destinataires des données</br>
    Informations sur les droits d’opposition, d’interrogation, d’accès et de rectification</br>
    Si besoin : les transferts de données envisagés à destination d’un Etat hors Union européenne</br>
    Base juridique du traitement de données (consentement des personnes concernées, respect d’une obligation prévue par un texte, exécution d’un contrat…)</br>
    Mention du droit d’introduire une plainte auprès de la CNIL</br></br>

Politique de protection des données personnelles (RGPD)</br></br>

Depuis le 25 mai 2018, date de l’entrée en vigueur de la nouvelle législation européenne sur la protection des données personnelles (RGPD), il est important de rappeler à l'internaute la possibilité d'exercer ses droits et de consulter la politique de protection des données personnelles en mentionnant l'url de la page "Données personnelles" (ou protection des données personnelles). Toute personne ayant eu des données personnelles collectées sur votre site peut demander à exercer ses droits : droit de rectification, limitation du traitement, portabilité des données, opposition...</br>
Autres obligations légales</br>
Respecter le code de la propriété intellectuelle</br>
</p>



        </form>

       
    </div>


   </div>
      
   <?php $content = ob_get_clean(); ?>

<?php require ('patron.php'); ?> 


   


