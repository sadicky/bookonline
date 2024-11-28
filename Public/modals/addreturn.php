 <!-- Add Room-->
 <div class="modal fade" tabindex="-1" role="dialog" id="add-return">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-xl">
                    <h5 class="modal-title">Retour d'un document</h5>
                    <form action="#" class="mt-2" method="post" id="formulaire_return">
                        <div class="row g-gs">
                            
                            <!--col-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Lecteur</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" data-search='on' id="member" name="member" >
                                            <option value=""></option>
                                            <?php foreach($members as $s):?>
                                                <option value="<?=$s->id_member?>" ><?=$s->nom?> <?=$s->postnom?> <?=$s->prenom?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Document</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" data-search='on' id="doc" name="doc" > </select>
                                    </div>
                                </div>
                            </div>
                            <!--col-->
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">#</label>
                                    <button class="btn btn-primary btn-block"  type="submit">Retourner</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->