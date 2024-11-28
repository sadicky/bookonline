 <!-- Add Room-->
 <div class="modal fade" tabindex="-1" role="dialog" id="add-emprunt">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Emprunter un document</h5>
                    <form action="#" class="mt-2" method="post" id="formulaire_emprunt">
                        <div class="row g-gs">
                            
                            <!--col-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="hidden" value="<?=$id?>" name="id" id="id">
                                        <select class="form-select js-select2" data-search='on' id="doc" name="doc" >
                                            <option value=""></option>
                                            <?php foreach($doc as $s):?>
                                            <option value="<?=$s->id_book?>" ><?=$s->titre?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--col-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block"  type="submit">Demander Emprunt</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->