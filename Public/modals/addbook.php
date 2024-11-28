 <!-- Add Room-->
 <div class="modal fade" tabindex="-1" role="dialog" id="add-book">
     <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content">
             <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
             <div class="modal-body modal-body-sm">
                 <h5 class="modal-title">Ajouter un nouveau Document</h5>
                 <form action="Public/script/addbook.php"  method="post" class="mt-2" enctype="multipart/form-data">
                     <div class="row g-gs">
                         <!--col-->
                         <!--col-->
                         <div class="col-md-3">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Titre</label>
                                 <input type="text" class="form-control" name="title" id="title" placeholder="Titre du Document" required>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-3">
                             <div class="form-group">
                                 <label class="form-label">Catégorie</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" data-search="on" id="cat" name="cat">
                                         <option value="">Select Categorie</option>
                                         <?php foreach ($getGenres as $g) { ?>
                                             <option value='<?= $g->id_genre ?>'><?= $g->name ?></option>
                                         <?php } ?>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-3">
                             <div class="form-group">
                                 <label class="form-label">Auteur</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" data-search="on" id="aut" name="aut">
                                         <option value="">Select Auteur</option>
                                         <?php foreach ($getAuteurs as $a) { ?>
                                             <option value='<?= $a->id_author ?>'><?= $a->names ?></option>
                                         <?php } ?>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-3">
                             <div class="form-group">
                                 <label class="form-label">Langues</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" data-search="on" id="lang" name="lang">
                                         <option value="">Select Auteur</option>
                                         <?php foreach ($getLangues as $l) { ?>
                                             <option value='<?= $l->id_book_language ?>'><?= $l->names ?></option>
                                         <?php } ?>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-3" id="isb">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">N° ISBN</label>
                                 <input type="text" class="form-control" name="isbn" id="isbn" placeholder="N° ISBN">
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-3">
                             <div class="form-group">
                                 <label class="form-label">Type Document</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" data-search="on" id="doc" name="doc">
                                         <option value="">Select Doc</option>
                                         <option value="Ouvrage">Ouvrage</option>
                                         <option value="TFC">TFC</option>
                                         <option value="Memoire">Memoire</option>
                                         <option value="Rapport de Stage">Rapport de Stage</option>
                                         <option value="Projet Tututoré">Projet Tutoré</option>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-3">
                             <div class="form-group">
                                 <label class="form-label">Format</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" data-search="on" id="format" name="format">
                                         <option value="">Select Format</option>
                                         <option value="ebook">E-Book</option>
                                         <option value="paper">paper</option>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-3">
                             <div class="form-group">
                                 <label class="form-label">Maison d'Edition</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" data-search="on" id="pub" name="pub">
                                         <option value="">Select editeur</option>
                                         <?php foreach ($getPublishers as $p) { ?>
                                             <option value='<?= $p->publisher_id ?>'><?= $p->name ?></option>
                                         <?php } ?>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4" id="files">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Fichier</label>
                                     <div class="form-control-wrap">
                                         <div class="form-file">
                                             <input type="file" id="livre" name="livre" class="form-file-input">
                                             <label class="form-file-label" for="customFile">Selectionner le fichier</label>
                                         </div>
                                     </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Nombre de Pages</label>
                                 <input type="number" class="form-control" name="pages" id="pages" placeholder="50">
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Année d'Edition</label>
                                 <input type="text" class="form-control" name="edit" id="edit" placeholder="Année d'Edition">
                             </div>
                         </div>
                         <!--col-->
                         <div class="col-md-4" id="descr">
                             <div class="form-group">
                                 <label class="form-label" for="bed-no-add">Résumé</label>
                                 <textarea class="form-control" name="desc" id="desc"></textarea>
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