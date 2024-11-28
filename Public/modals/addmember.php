 <!-- Add Room-->
 <div class="modal fade" tabindex="-1" role="dialog" id="add-member">
     <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content">
             <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
             <div class="modal-body modal-body-sm">
                 <h5 class="modal-title">Ajouter un nouvel membre</h5>
                 <form action="#" class="mt-2" id="formulaire_member">
                     <div class="row g-gs">
                         <!--col-->
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Nom</label>
                                 <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom du membre" required>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Post-Nom</label>
                                 <input type="text" class="form-control" name="postnom" id="postnom" placeholder="Post-Nom du membre">
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Prénom</label>
                                 <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom du membre">
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Matricule</label>
                                 <?php
                                    $string = "0123456789";
                                    $string = str_shuffle($string);
                                    $titre = substr($string, 0, 6);
                                    ?>
                                 <input type="text" class="form-control" value="<?php echo 'M-' . $titre ?>" name="mat" id="mat" readonly>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="form-label">Sexe</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" id="sexe" name="sexe" required>
                                         <option value="">Select Sexe</option>
                                         <option value="M">Homme</option>
                                         <option value="F">Femme</option>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="form-label">Type Membre</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" id="type" name="type">
                                         <option value="">Select Membre</option>
                                         <option value="I">Interne</option>
                                         <option value="E">Externe</option>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4" id="f">
                             <div class="form-group">
                                 <label class="form-label">Faculté</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" id="fac" name="fac">
                                         <option value="">Select Membre</option>
                                         <?php foreach ($getFac as $dep) { ?>
                                             <option value='<?= $dep->fac_id ?>'><?= $dep->fac ?></option>
                                         <?php } ?>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4" id="d">
                             <div class="form-group">
                                 <label class="form-label">Département</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" id="dep" name="dep"></select>
                                 </div>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4" id="c">
                             <div class="form-group">
                                 <label class="form-label">Classe</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" id="classe" name="classe"></select>
                                 </div>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4" id="card1">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">N° Carte D'Etudiant</label>
                                 <input type="text" class="form-control" name="card" id="card" placeholder="N° Carte D'Etudiant">
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Email</label>
                                 <input type="email" class="form-control" name="email" id="email" placeholder="Email@bookap.com">
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Tél</label>
                                 <input type="text" class="form-control" name="tel" id="tel" placeholder="Tel">
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4" id="prov1">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Provenance</label>
                                 <input type="text" class="form-control" name="prov" id="prov" placeholder="Provenance">
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4" id="aut1">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Contact Autorité</label>
                                 <input type="text" class="form-control" name="aut" id="aut" placeholder="Contact Autorité">
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Adresse</label>
                                 <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse du membre">
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Password</label>
                                 <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Confirmer le Password</label>
                                 <input type="password" class="form-control" id="cpwd" name="cpwd" placeholder="Confirm Password">
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-12">
                             <div class="form-group">
                                 <button class="btn btn-primary btn-block" type="submit" data-bs-dismiss="modal">Sauvegarder</button>
                             </div>
                         </div>
                     </div>
                 </form>
             </div><!-- .modal-body -->
         </div><!-- .modal-content -->
     </div><!-- .modal-dialog -->
 </div><!-- .modal -->