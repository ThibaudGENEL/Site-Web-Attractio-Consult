<?php
include "entete.php";
?>
<section>
<?php 
include "aside.php";
?>
            <div class="col-sm-8">
                <form name="Inscription" method="post" action="traitInscription.php">
                <div class="form-group">
                    <label for="EmailDemo">Votre Email:</label>
                    <input type="email" name="mail" class="form-control" id="EmailDemo" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="passDemo">Entrer mot de passe:</label>
                    <input type="password" name="mdp" class="form-control" id="passDemo" aria-describedby="passHelp" placeholder="Password">
                </div>
                <div class="form-check">
                    <input type="checkbox" name="CGU" value="accord" class="form-check-input" id="CheckDemo">
                    <label class="form-check-label" for="CheckDemo">J'accepte les Conditions Generales d'Utilisation</label>
                </div>
                <button type="submit" class="btn btn-success">Create Account</button>
                </form>
            </div>
          </div>
        </div>
</section>
 <!-- FOOTER -->
 <?php include 'footer.html';?>    
</body>
</html>