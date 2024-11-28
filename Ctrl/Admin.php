<?php

function login()
{
	include('Models/Admin/auth.php');
	include('Vues/Admin/login1.php');
}

function Register()
{
	require_once('Models/Admin/member.class.php');
	$s = new Member();
	$getFac = $s->getFaculties();
	include('Vues/Admin/register.php');
}

function forgot()
{
	require_once('Models/Admin/forgot.php');
	include('Vues/forgot-password.php');
}

//Fonction Login
function error404()
{
	// include('Vues/Admin/error404.php');
	if (@$_SESSION['logged']) {
		$title = 'Error 404';
		include('Vues/Admin/error404.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

//Fonction de la page non trouvée
function error500()
{
	if (@$_SESSION['logged']) {
		include('Vues/Admin/error500.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}
function Logout()
{
	session_start();
	require_once('Models/Admin/connexion.php');
	
	@$action = $_SESSION['role']." Logout";
	@$description = $_SESSION['noms']. " est deconnecté avec succès.";
	$date = date('Y-m-d H:i:s');
	setLogout($action,$description,$date);

	session_destroy();

	header("location:" . WEBROOT);
}

//Fonction du tableua de Board
function Dashboard()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');
		require_once('Models/Admin/member.class.php');

		$title = "Tableau de board";

		ob_start();
		$s = new Book();
		$m = new Member();

		$g = count($genres = $s->getGenres());
		$a = count($s->getAuthors());
		$b = count($s->getBooks());
		$l = count($m->getMembers());
		$data = $s->getBooks();

		include('Vues/Admin/home.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

//Fonction pour les plans de souscription
function Plans()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/subscription.class.php');

		$title = "Bouquets Abonnements";

		ob_start();
		$s = new Subscription();
		$data = $s->getPlans();

		include('Vues/Admin/plans.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

function Plan()
{
		require_once('Models/Admin/subscription.class.php');
		
		$email = $_GET['email'];
		$s = new Subscription();
		$data = $s->getPlans();

		include('Vues/Admin/plan.php');
}


function Users()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/user.class.php');

		$title = "Gestion des Utilisateurs";
		$msg = "";

		ob_start();
		$user = new User();
		$users = $user->getUsers();
		include('Vues/Admin/users.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}


function Genres()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');

		$title = "Catégories de Livres";

		ob_start();
		$genre = new Book();
		$genres = $genre->getGenres();
		include('Vues/Admin/genres.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

function Auteurs()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');

		$title = "Gestion des Auteurs";

		ob_start();
		$b = new Book();
		$auteurs = $b->getAuthors();
		include('Vues/Admin/auteurs.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

function Publishers()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');

		$title = "Modules pour les Editeurs";

		ob_start();
		$b = new Book();

		$publishers = $b->getPublishers();

		include('Vues/Admin/publishers.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

function BLanguage()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');

		$title = "Langue de Livres";

		ob_start();
		$b = new Book();

		$l = $b->getBLanguages();

		include('Vues/Admin/blanguage.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

function Facultes()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/member.class.php');
		$title = "Gestion de Departement";

		ob_start();
		$m = new Member();

		$facultes = $m->getFaculties();

		include('Vues/Admin/facultes.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}


function Departements()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/member.class.php');
		$title = "Gestion de Filieres ";

		ob_start();
		$m = new Member();

		$facultes = $m->getFaculties();
		$departements = $m->getDepartements();

		include('Vues/Admin/departements.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}



function Classes()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/member.class.php');
		$title = "Gestion de Promotions";

		ob_start();
		$m = new Member();

		$facultes = $m->getFaculties();
		$departements = $m->getDepartements();
		$classes = $m->getClasses();

		include('Vues/Admin/classes.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}


//Fonction pour les plans de souscription
function Subscription()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/subscription.class.php');

		$title = "Gestion d'Abonnement";

		ob_start();
		$s = new Subscription();
		$data = $s->getSubscriptions();

		include('Vues/Admin/subscriptions.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

//Fonction pour les plans de souscription
function Members()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/member.class.php');

		$title = "Gestion de Lecteurs";

		ob_start();
		$s = new Member();
		$data = $s->getMembers();
		$getFac = $s->getFaculties();

		include('Vues/Admin/membres.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

function Verify()
{
		require_once('Models/Admin/member.class.php');

		$email = $_GET['email'];

		include('Vues/Admin/verify.php');
}

function Books()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');
		$title = "Gestion de Documents";

		ob_start();
		$s = new Book();
		$data = $s->getBooks();
		$getPublishers = $s->getPublishers();
		$getLangues = $s->getBLanguages();
		$getGenres = $s->getGenres();
		$getAuteurs = $s->getAuthors();

		include('Vues/Admin/books.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}
function Etudiants()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/member.class.php');
		$title = "Gestion des Etudiants";

		ob_start();
		$s = new Member();
		$data = $s->getEtudiants();

		include('Vues/Admin/etudiants.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}


function DetailL()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/member.class.php');

		$title = "Détail du Lecteur";

		ob_start();
		$id = $_GET['id'];
		$s = new Member();
		$data = $s->getMemberId($id);

		include('Vues/Admin/detailL.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}


function DetailA()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');

		$title = "Détail de l'Auteur";

		ob_start();
		$id = $_GET['id'];
		$s = new Book();
		$dat = $s->getAuthor($id);
		$data = $s->getAuthorBook($id);
		$nb = $s->getCAuthorBook($id);

		include('Vues/Admin/detailA.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}
function View()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');
		ob_start();
		$id = $_GET['id'];
		$book = new Book();
		$data = $book->getBook($id);
		$d = $book->getDocVisits($id);
		$title = "Afficher le document (".$data->titre." de ".$data->auteur.")";


		include('Vues/Admin/view.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

function ViewBook()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');
		ob_start();
		$id = $_GET['id'];
		$book = new Book();
		$data = $book->viewBook($id);
		$title = "Visualisation du document";


		include('Vues/Admin/viewbook.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}


function Circulations()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');
		ob_start();
		// $id = $_GET['id'];
		$book = new Book();
		$data = $book->getCirculations();
		$title = "Circulations";


		include('Vues/Admin/circulations.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}


function Borrow()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');
		require_once('Models/Admin/member.class.php');
		ob_start();
		$book = new Book();
		$m = new Member();
		
		$member = $m->getMemberEmail($_SESSION['email']);
		@$id = $member->id_member;
		
	   if($_SESSION['role'] == 'Membre'){
		$data = $book->getEmpruntMembre($id);
	   }else{
		$data = $book->getEmprunts();
	   }

		$doc = $book->getBookPaper();
		$title = "Emprunts";


		include('Vues/Admin/emprunts.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}


function Returned()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/member.class.php');
		require_once('Models/Admin/book.class.php');
		ob_start();
		$book = new Book();
		$s = new Member();
		$data = $book->getReturned();
		$title = "Retournés";

		$members = $s->getMembers();

		$member = $s->getMemberEmail($_SESSION['email']);
		@$id = $member->id_member;
		
	   if($_SESSION['role'] == 'Membre'){
		$data = $book->getReturnedMembre($id);
	   }else{
		$data = $book->getReturned();
	   }

		include('Vues/Admin/returned.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}


function AddQty()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');
		ob_start();
		$book = new Book();
		$id = $_GET['id'];
		$data = $book->getBook($id);
		$title = "Ajouter la Quantité (".$data->titre.")";
		$message = "<h5>La quantité actuelle:<b style='color:red'>".$data->qty."</b></h5>";


		include('Vues/Admin/addqty.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

//Fonction pour les plans de souscription
function RMembers()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/member.class.php');

		// $title = "Sortie Lecteurs";

		ob_start();
		$s = new Member();
		$data = $s->getMembers();
		$getFac = $s->getFaculties();

		include('Vues/Admin/rmembers.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

//Fonction pour les plans de souscription
function RDocs()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');

		ob_start();
		$s = new Book();
		$data = $s->getBooks();

		include('Vues/Admin/rdocs.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

//Fonction pour les plans de souscription
function Logs()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/login.class.php');

		ob_start();
		$s = new Login();
		$data = $s->getLogs();

		include('Vues/Admin/log.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

//Fonction pour les plans de souscription
function RReturn()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');

		ob_start();
		$s = new Book();
		$data = $s->getReturned();

		include('Vues/Admin/rreturn.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}

//Fonction pour les plans de souscription
function REmprunts()
{
	if (@$_SESSION['logged']) {
		require_once('Models/Admin/book.class.php');

		ob_start();
		$s = new Book();
		$data = $s->getEmprunts();

		include('Vues/Admin/remprunt.php');
		$contents = ob_get_contents();
		ob_get_clean();

		include('Vues/Admin/template.php');
	} else {
		include('Vues/Admin/error500.php');
	}
}