<?php
require_once('../../Models/Admin/book.class.php');
$book = new Book();
$id = isset($_POST['id']) ? $_POST['id'] : '';
$view = $book->getBook($id);
// var_dump($view);die();
?>


<form action="#" method="post" class="mt-2" id="formeditbook">
    <div class="row g-gs">
        <!--col-->
        <!--col-->
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label" for="bed-no-add">Titre</label>
                <input type="text" class="form-control" name="title" id="title" value="<?=$view->titre?>">
                <input type="hidden" name="id" id="id" value="<?=$view->id_book?>">
            </div>
        </div>
        <!--col-->
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">Catégorie</label>
                <div class="form-control-wrap">
                    <select class="form-select js-select2">
                       <option value=''><?=$view->genre?></option>
                    </select>
                </div>
            </div>
        </div>
        <!--col-->
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">Auteur</label>
                <div class="form-control-wrap">
                    <select class="form-select js-select2">
                    <option value=''><?=$view->auteur?></option>
                    </select>
                </div>
            </div>
        </div>
        <!--col-->
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label" for="bed-no-add">N° ISBN</label>
                <input type="text" class="form-control" value=" <?=$view->isbn?>" name="isbn" id="isbn">
            </div>
        </div>
        <!--col-->
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">Type Document</label>
                <div class="form-control-wrap">
                    <select class="form-select js-select2" data-search="on" id="doc" name="doc">
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
                    <input type="text" value="<?=$view->format?>" class="form-select" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <label class="form-label">Maison d'Edition</label>
            <div class="form-control-wrap">
                    <select class="form-select js-select2" >
                    <option value=''><?=$view->publisher?></option>
                    </select>
                </div>
                </div>
        </div>
        <!--col-->
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label" for="bed-no-add">Nombre de Pages</label>
                <input type="number" value="<?=$view->nbr_page?>" class="form-control" name="pages" id="pages">
            </div>
        </div>
        <!--col-->
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label" for="bed-no-add">Année d'Edition</label>
                <input type="text" value="<?=$view->edition?>" class="form-control" name="edit" id="edit">
            </div>
        </div>
        <!--col-->
        <div class="col-md-9">
            <div class="form-group">
                <label class="form-label" for="bed-no-add">Résumé</label>
                <textarea class="form-control" name="desc" id="desc"><?=$view->descr?></textarea>
            </div>
        </div>
        <!--col-->
        <div class="col-md-12">
            <div class="form-group">
                <button class="btn btn-primary edit-book btn-block" type="submit" data-bs-dismiss="modal">Sauvegarder</button>
            </div>
        </div>
    </div>
</form>