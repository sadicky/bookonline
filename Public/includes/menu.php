
<div class="nk-sidebar-element nk-sidebar-body">
    <div class="nk-sidebar-content">
        <div class="nk-sidebar-menu" data-simplebar>
            <ul class="nk-menu">
                <li class="nk-menu-heading">
                    <h6 class="overline-title text-primary-alt">General</h6>
                </li>
                <?php if($_SESSION['role']=='Admin' || $_SESSION['role']=='Librarian' || $_SESSION['role']=='Membre'):?>
                    <li class="nk-menu-item">
                        <a href="<?= WEBROOT ?>dashboard" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>
                <?php endif?>
                <!-- .nk-menu-item -->
                <?php if($_SESSION['role']=='Admin' || $_SESSION['role']=='Librarian' || $_SESSION['role']=='Membre'):?>
                    <li class="nk-menu-item has-sub">
                        <a href="<?= WEBROOT ?>genres" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-tag"></em></span>
                            <span class="nk-menu-text">Categorie</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                <?php endif?>
                
                <?php if($_SESSION['role']=='Admin' || $_SESSION['role']=='Librarian' || $_SESSION['role']=='Membre'):?>
                    <li class="nk-menu-item has-sub">
                        <a href="<?= WEBROOT ?>livres" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-book-read"></em></span>
                            <span class="nk-menu-text">Livres</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                <?php endif?>
                
                <?php if($_SESSION['role']=='Admin' || $_SESSION['role']=='Librarian' || $_SESSION['role']=='Membre'):?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-reload"></em></span>
                            <span class="nk-menu-text">Circulations</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?= WEBROOT ?>circulations" class="nk-menu-link"><span class="nk-menu-text">Tous</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?= WEBROOT ?>emprunts" class="nk-menu-link"><span class="nk-menu-text">Emprunts</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?= WEBROOT ?>return" class="nk-menu-link"><span class="nk-menu-text">Retournés</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                <?php endif?>
                
                <?php if($_SESSION['role']=='Admin' || $_SESSION['role']=='Librarian' || $_SESSION['role']=='Membre'):?>
                    <li class="nk-menu-item has-sub">
                        <a href="<?= WEBROOT ?>auteurs" class="nk-menu-link ">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-alt"></em></span>
                            <span class="nk-menu-text">Auteurs</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                <?php endif?>

                
                <?php if($_SESSION['role']=='Admin' || $_SESSION['role']=='Librarian'):?>
                    <li class="nk-menu-item has-sub">
                        <a href="<?= WEBROOT ?>publishers" class="nk-menu-link ">
                            <span class="nk-menu-icon"><em class="icon ni ni-edit"></em></span>
                            <span class="nk-menu-text">Editeurs</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                <?php endif?>

                
                <?php if($_SESSION['role']=='Admin' || $_SESSION['role']=='Librarian'  || $_SESSION['role']=='SGAC'):?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                            <span class="nk-menu-text">Rapports</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?= WEBROOT ?>rmember" class="nk-menu-link"><span class="nk-menu-text">Lecteurs</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?= WEBROOT ?>rdoc" class="nk-menu-link"><span class="nk-menu-text">Documents</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?= WEBROOT ?>emp" class="nk-menu-link"><span class="nk-menu-text">Emprunts</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?= WEBROOT ?>ret" class="nk-menu-link"><span class="nk-menu-text">Retournés</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?= WEBROOT ?>log" class="nk-menu-link"><span class="nk-menu-text">Fréquentation</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                <?php endif?>
                
                <?php if($_SESSION['role']=='Admin'):?>
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">administration</h6>
                    </li><!-- .nk-menu-heading -->
                <?php endif?>

                
                <?php if($_SESSION['role']=='Admin'):?>
                    <li class="nk-menu-item has-sub">
                        <a href="<?= WEBROOT ?>users" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-circle"></em></span>
                            <span class="nk-menu-text">Utilisateurs</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                <?php endif?>

                
                <?php if($_SESSION['role']=='Admin' || $_SESSION['role']=='Librarian'):?>
                    <li class="nk-menu-item has-sub">
                        <a href="<?= WEBROOT ?>membres" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                            <span class="nk-menu-text">Lecteurs</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                <?php endif?>

                
                <?php if($_SESSION['role']=='Admin' || $_SESSION['role']=='Librarian'):?>
                    <li class="nk-menu-item has-sub">
                        <a href="<?= WEBROOT ?>plans" class="nk-menu-link ">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-list-fill"></em></span>
                            <span class="nk-menu-text">Plans</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                <?php endif?>
                
                <?php if($_SESSION['role']=='Admin' || $_SESSION['role']=='Librarian'):?>
                    <li class="nk-menu-item has-sub">
                        <a href="<?= WEBROOT ?>souscription" class="nk-menu-link ">
                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                            <span class="nk-menu-text">Souscription</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                <?php endif?>

                
                <?php if($_SESSION['role']=='Admin'  || $_SESSION['role']=='Librarian' ):?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                            <span class="nk-menu-text">Parametre</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?= WEBROOT ?>blanguage" class="nk-menu-link"><span class="nk-menu-text">Langues(Livres) </span></a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                    <span class="nk-menu-text">ISC</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="<?= WEBROOT ?>etudiants" class="nk-menu-link"><span class="nk-menu-text">Tous les étudiants</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="<?= WEBROOT ?>facultes" class="nk-menu-link"><span class="nk-menu-text">Départements</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="<?= WEBROOT ?>departements" class="nk-menu-link"><span class="nk-menu-text">Filières</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="<?= WEBROOT ?>classes" class="nk-menu-link"><span class="nk-menu-text">Promotion</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                <?php endif?>
            </ul><!-- .nk-menu -->
        </div><!-- .nk-sidebar-menu -->
    </div><!-- .nk-sidebar-content -->
</div><!-- .nk-sidebar-element -->