 <!-- Add Room-->
 <div class="modal fade" tabindex="-1" role="dialog" id="add-plan">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
             <div class="modal-body modal-body-md">
                 <h5 class="modal-title">Ajouter un nouveau plan</h5>
                 <form action="#" method="post" class="mt-2" id="formulaire_plan">
                     <div class="row g-gs">
                         <!--col-->
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Libellé</label>
                                 <input type="text" class="form-control" name="name" id="name" placeholder="Libellé" required>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="form-label">Fréquence</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" data-search="on" id="freq" name="freq" required>
                                         <option value="">Select Role</option>
                                         <option value="Semaine">7 jours</option>
                                         <option value="Mois">Mensuel</option>
                                         <option value="Année">Annuel</option>
                                         <option value="Illimité">Illimité</option>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Prix</label>
                                 <input type="text" class="form-control" name="prix" id="prix" placeholder="10$" required>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Déscription</label>
                                 <textarea class="form-control" id="desc" name="desc" placeholder="Déscription"></textarea>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-12">
                             <div class="form-group">
                                 <button class="btn btn-primary btn-block" type="submit" data-bs-dismiss="modal">Sauvegarder</button>
                             </div>
                         </div>
                         <!--col-->
                     </div>
                 </form>
             </div><!-- .modal-body -->
         </div><!-- .modal-content -->
     </div><!-- .modal-dialog -->
 </div><!-- .modal -->