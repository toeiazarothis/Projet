<?php
    // partie pour erreur site
    function errorOrSuccesOnSite($errorOrSucces) {
        $texte = '';

        if($errorOrSucces == 1){//utilisateur inexistant
            $texte .= '<div class="alert alert-danger" id="error" style="position:fixed; width:100%">Cet utilisateur est inexistant</div>';
        }

        if($errorOrSucces == 2){//mot de passe incorrect
            $texte .= '<div class="alert alert-warning" id="error" style="position:fixed; width:100%">Vous avez saisie un mauvais mot de passe</div>';
        }

        if($errorOrSucces == 3){//echec envoie cours/devoirs
            $texte .= '<div class="alert alert-danger" style="position:fixed; width:100%">Impossible d\'envoyer les cours & devoirs</div>';
        }

        if($errorOrSucces == 4){//success envoie cours/devoirs
            $texte .= '<div class="alert alert-success" style="position:fixed; width:100%">L\'envoie du résumer du cours & devoirs ont été envoyé</div>';
        }

        if($errorOrSucces == 5){//echec envoie abs
            $texte .= '<div class="alert alert-danger" style="position:fixed; width:100%">L\'Absence des élèves n\'ont pas pus être envoyer</div>';
        }

        if($errorOrSucces == 6){//succes envoie abs
            $texte .= '<div class="alert alert-success" style="position:fixed; width:100%">L\'Absence des élèves à été effectuer</div>';
        }

        if($errorOrSucces == 7){//echec envoie appreciation
            $texte .= '<div class="alert alert-danger" style="position:fixed; width:100%">L\'Appréciation de l\'élève n\'as pas pus être mise à jour</div>';
        }

        if($errorOrSucces == 8){//succes envoie appreciation
            $texte .= '<div class="alert alert-success" style="position:fixed; width:100%">L\'Appréciation de l`élève à été mise à jour</div>';
        }

        if($errorOrSucces == 9){//echec ajout/modif eleve
            $texte .= '<div class="alert alert-danger" style="position:fixed; width:100%">L\'Ajout ou la mise à jour de l\'élève n\'a pas pus être éffectuer</div>';
        }

        if($errorOrSucces == 10){//succes ajout/modif eleve
            $texte .= '<div class="alert alert-success" style="position:fixed; width:100%">L\'Ajout ou la mise à jour de l\'élève a été éffectuer</div>';
        }

        if($errorOrSucces == 11){//echec supp eleve
            $texte .= '<div class="alert alert-danger" style="position:fixed; width:100%">Une erreur est survenu lors de la suppression de l\'élève</div>';
        }

        if($errorOrSucces == 12){//succes supp eleve
            $texte .= '<div class="alert alert-success" style="position:fixed; width:100%">La suppression de l\'élève à bien été éffectuer</div>';
        }

        if($errorOrSucces == 13){//echec ajout/modif prof
            $texte .= '<div class="alert alert-danger" style="position:fixed; width:100%">L\'Ajout ou la mise à jour du professeur n\'a pas pu être éffectuer</div>';
        }

        if($errorOrSucces == 14){//succes ajout/modif prof
            $texte .= '<div class="alert alert-success" style="position:fixed; width:100%">L\'Ajout ou la mise à jour du professeur a été éffectuer</div>';
        }

        if($errorOrSucces == 15){//echec supp prof
            $texte .= '<div class="alert alert-danger" style="position:fixed; width:100%">Une erreur est survenu lors de la suppression de l\'élève</div>';
        }

        if($errorOrSucces == 16){//succes supp prof
            $texte .= '<div class="alert alert-success" style="position:fixed; width:100%">La suppression du professeur à bien été éffectuer</div>';
        }

        if($errorOrSucces == 17){//nom&prenom existe deja
            $texte .= '<div class="alert alert-danger" style="position:fixed; width:100%">Cette utilisateur existe déjà!</div>';
        }

        if($errorOrSucces == 18){//echec ajout/modif membre perso
            $texte .= '<div class="alert alert-danger" style="position:fixed; width:100%">L\'Ajout ou la mise à jour du membre n\'a pas pus être éffectuer</div>';
        }

        if($errorOrSucces == 19){//succes ajout/modif membre perso
            $texte .= '<div class="alert alert-success" style="position:fixed; width:100%">L\'Ajout ou la mise à jour du membre a été éffectuer</div>';
        }

        if($errorOrSucces == 20){//echec supp membre perso
            $texte .= '<div class="alert alert-danger" style="position:fixed; width:100%">Une erreur est survenu lors de la suppression du membre</div>';
        }

        if($errorOrSucces == 21){//succes supp membre perso
            $texte .= '<div class="alert alert-success" style="position:fixed; width:100%">La suppression du membre à bien été éffectuer</div>';
        }

        if($errorOrSucces == 22){//echec add class
            $texte .= '<div class="alert alert-danger" style="position:fixed; width:100%">L\'Ajout de la classe n\'a pas pus être éffectuer</div>';
        }

        if($errorOrSucces == 23){//succes add class
            $texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Cette classe à été ajouté avec succès</div>';
        }

        if($errorOrSucces == 24){//echec supp class
            $texte .= '<div class="alert alert-danger" style="position:fixed; width:100%">Une erreur est survenu lors de la suppression de la classe</div>';
        }

        if($errorOrSucces == 25){//succes supp class
            $texte .= '<div class="alert alert-success" style="position:fixed; width:100%">La suppression de la classe à bien été éffectuer</div>';
        }

        if($errorOrSucces == 26){//echec add note
            $texte .= '<div class="alert alert-danger" style="position:fixed; width:100%">Une erreur est survenu lors de la suppression de l\'ajout des notes</div>';
        }

        if($errorOrSucces == 27){//succes add note
            $texte .= '<div class="alert alert-success" style="position:fixed; width:100%">L\'Ajout des notes à été éffectuer</div>';
        }

        return $texte;
    }
?>