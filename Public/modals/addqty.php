 <!-- Add Room-->
 <div class="modal fade" tabindex="-1" role="dialog" id="add-qty">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Ajouter la Quantité</h5>
                    <form action="#" class="mt-2" method="post" id="formulaire_qty">
                        <div class="row g-gs">
                            
                            <!--col-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="hidden" value="<?=$id?>" name="id" id="id">
                                        <input type="number" class="form-control" id="qty" name="qty" >
                                            
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