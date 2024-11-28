<?php
require_once("connexion.php");

class Book
{
    //ajouter un Admin
    public function setBook(
        $titre,
        $typeDoc,
        $isbn,
        $book_file,
        $descr,
        $format,
        $nbr_page,
        $edition,
        $id_author,
        $id_genre,
        $id_book_language,
        $publisher_id,
        $statut
    ) {
        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_books (titre,typeDoc,isbn,book_file,descr,format,nbr_page,
        edition,id_author,id_genre,id_book_language,publisher_id,statut) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $addline = $add->execute(array(
            $titre,
            $typeDoc,
            $isbn,
            $book_file,
            $descr,
            $format,
            $nbr_page,
            $edition,
            $id_author,
            $id_genre,
            $id_book_language,
            $publisher_id,
            $statut
        ));
        return $addline;
    }

    //ajouter un Admin
    public function setGenre($name, $description)
    {
        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_genres (name,description) VALUES (?,?)");
        $addline = $add->execute(array($name, $description));
        return $addline;
    }

    public function setEmprunt($doc, $member)
    {
        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_emprunts (id_book,member_id) VALUES (?,?)");
        $addline = $add->execute(array($doc, $member));
        return $addline;
    }

    public function setReturn($doc, $member)
    {
        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_retour (id_book,member_id) VALUES (?,?)");
        $addline = $add->execute(array($doc, $member));
        return $addline;
    }



    public function setBookLanguage($names, $code)
    {
        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_books_language (names,code) VALUES (?,?)");
        $addline = $add->execute(array($names, $code));
        return $addline;
    }

    public function setAuthor($name)
    {
        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_authors (names) VALUES (?)");
        $addline = $add->execute(array($name));
        return $addline;
    }

    public function setPublisher($name,$lieu)
    {
        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_publishers (name,lieu) VALUES (?,?)");
        $addline = $add->execute(array($name,$lieu));
        return $addline;
    }


    public function getPublishers()
    {
        $db = getConnection();
        $add = $db->prepare("SELECT * FROM tbl_publishers");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }
    
    public function getPublisher($id)
    {
        $db = getConnection();
        $add = $db->prepare("SELECT * FROM tbl_publishers where publisher_id=?");
        $add->execute([$id]);
        $tbP =  $add->fetchObject();
        return $tbP;
    }


    public function getBLanguages()
    {
        $db = getConnection();
        $add = $db->prepare("SELECT * FROM tbl_books_language");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    public function getBLanguage($id)
    {
        $db = getConnection();
        $add = $db->prepare("SELECT * FROM tbl_books_language where id_book_language=?");
        $add->execute([$id]);
        $tbP =  $add->fetchObject();
        return $tbP;
    }
    public function getGenres()
    {
        $db = getConnection();
        $add = $db->prepare("SELECT * FROM tbl_genres");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    
    public function getGenre($id)
    {
        $db = getConnection();
        $add = $db->prepare("SELECT * FROM tbl_genres where id_genre=?");
        $add->execute([$id]);
        $tbP = $add->fetchObject();
        return $tbP;
    }
    public function getBooksType($type)
    {
        $db = getConnection();
        $add = $db->prepare("SELECT created_at, id_book, titre, typeDoc, isbn, book_file, descr, format, nbr_page, edition, a.names as auteur, g.name as genre, bl.names as bl, p.name as publisher, b.statut 
        FROM tbl_books as b,tbl_publishers as p, tbl_genres as g, tbl_authors as a, tbl_books_language as bl 
        WHERE bl.id_book_language = b.id_book_language and b.id_genre = g.id_genre and b.id_author = a.id_author and p.publisher_id = b.publisher_id and typeDoc=?");
        $add->execute([$type]);
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }
    public function getBooks()
    {
        $db = getConnection();
        $add = $db->prepare("SELECT created_at,id_book, titre, typeDoc, isbn, book_file, descr, format, nbr_page, edition, a.names as auteur, g.name as genre, bl.names as bl, p.name as publisher, b.statut 
        FROM tbl_books as b,tbl_publishers as p, tbl_genres as g, tbl_authors as a, tbl_books_language as bl 
        WHERE bl.id_book_language = b.id_book_language and b.id_genre = g.id_genre and b.id_author = a.id_author and p.publisher_id = b.publisher_id;");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    public function getBookPaper()
    {
        $db = getConnection();
        $add = $db->prepare("SELECT id_book, titre, typeDoc, isbn, book_file, descr, format, nbr_page, edition, a.names as auteur, g.name as genre, bl.names as bl, p.name as publisher, b.statut 
        FROM tbl_books as b,tbl_publishers as p, tbl_genres as g, tbl_authors as a, tbl_books_language as bl 
        WHERE bl.id_book_language = b.id_book_language and b.id_genre = g.id_genre and b.id_author = a.id_author and p.publisher_id = b.publisher_id and b.format='paper'  and qty>0");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }
    
    public function getCirculations()
    {
        $db = getConnection();
        $add = $db->prepare("SELECT id_book, titre, isbn,b.qty, a.names as auteur,  b.statut 
        FROM tbl_books as b,tbl_publishers as p, tbl_genres as g, tbl_authors as a, tbl_books_language as bl 
        WHERE bl.id_book_language = b.id_book_language and b.id_genre = g.id_genre and b.id_author = a.id_author 
        and p.publisher_id = b.publisher_id and b.format='paper'");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    public function getEmprunts()
    {
        $db = getConnection();
        $add = $db->prepare("SELECT m.id_member,b.id_book, titre, isbn,date_emprunt as date, a.names as auteur, m.nom , m.prenom, m.postnom, m.matricule, e.statut 
        FROM tbl_members as m, tbl_books as b,tbl_publishers as p, tbl_genres as g, tbl_authors as a, tbl_books_language as bl, tbl_emprunts as e 
        WHERE bl.id_book_language = b.id_book_language and b.id_genre = g.id_genre and b.id_author = a.id_author 
        and p.publisher_id = b.publisher_id and b.format='paper' and e.member_id=m.id_member and returned='0' and e.id_book=b.id_book");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }
    
    public function getEmpruntMembre($id)
    {
        $db = getConnection();
        $add = $db->prepare("SELECT m.id_member,b.id_book, titre, isbn,date_emprunt as date, a.names as auteur, m.nom , m.prenom, m.postnom, m.matricule, e.statut 
        FROM tbl_members as m, tbl_books as b,tbl_publishers as p, tbl_genres as g, tbl_authors as a, tbl_books_language as bl, tbl_emprunts as e 
        WHERE bl.id_book_language = b.id_book_language and b.id_genre = g.id_genre and b.id_author = a.id_author 
        and p.publisher_id = b.publisher_id and b.format='paper' and e.member_id=m.id_member and returned='0' and e.id_book=b.id_book and m.id_member=?");
        $add->execute([$id]);
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }
    public function getEmpruntsNot($id)
    {
        $db = getConnection();
        $add = $db->prepare("SELECT m.id_member,b.id_book, titre, isbn,date_emprunt as date, a.names as auteur, m.nom , m.prenom, m.postnom, m.matricule, e.statut 
        FROM tbl_members as m, tbl_books as b,tbl_publishers as p, tbl_genres as g, tbl_authors as a, tbl_books_language as bl, tbl_emprunts as e 
        WHERE bl.id_book_language = b.id_book_language and b.id_genre = g.id_genre and b.id_author = a.id_author 
        and p.publisher_id = b.publisher_id and b.format='paper' and e.member_id=m.id_member and e.id_book=b.id_book and e.statut='2' and returned='0' and m.id_member=? ");
        $add->execute([$id]);
        $tbP = $add->fetchObject();
        return $tbP;
    }

    public function getReturned()
    {
        $db = getConnection();
        $add = $db->prepare("SELECT m.id_member,b.id_book, titre, isbn,date_retour as date, a.names as auteur, m.nom , m.prenom, m.postnom, m.matricule 
        FROM tbl_members as m, tbl_books as b,tbl_publishers as p, tbl_genres as g, tbl_authors as a, tbl_books_language as bl, tbl_retour as e 
        WHERE bl.id_book_language = b.id_book_language and b.id_genre = g.id_genre and b.id_author = a.id_author 
        and p.publisher_id = b.publisher_id and b.format='paper' and e.member_id=m.id_member and e.id_book=b.id_book ");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    
    public function getReturnedMembre($id)
    {
        $db = getConnection();
        $add = $db->prepare("SELECT m.id_member,b.id_book, titre, isbn,date_retour as date, a.names as auteur, m.nom , m.prenom, m.postnom, m.matricule 
        FROM tbl_members as m, tbl_books as b,tbl_publishers as p, tbl_genres as g, tbl_authors as a, tbl_books_language as bl, tbl_retour as e 
        WHERE bl.id_book_language = b.id_book_language and b.id_genre = g.id_genre and b.id_author = a.id_author 
        and p.publisher_id = b.publisher_id and b.format='paper' and e.member_id=m.id_member and e.id_book=b.id_book and m.id_member=?");
        $add->execute([$id]);
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }
    
    public function getReturn($fdate, $tdate)
    {
        $db = getConnection();
        $add = $db->prepare("SELECT m.id_member,b.id_book, titre, isbn,date_retour as date, a.names as auteur, m.nom , m.prenom, m.postnom, m.matricule 
        FROM tbl_members as m, tbl_books as b,tbl_publishers as p, tbl_genres as g, tbl_authors as a, tbl_books_language as bl, tbl_retour as e 
        WHERE bl.id_book_language = b.id_book_language and b.id_genre = g.id_genre and b.id_author = a.id_author 
        and p.publisher_id = b.publisher_id and b.format='paper' and e.member_id=m.id_member and e.id_book=b.id_book and (date_retour BETWEEN '$fdate' and '$tdate') ");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    public function getBook($id)
    {
        $db = getConnection();
        $add = $db->prepare("SELECT id_book,qty, titre, typeDoc, isbn, book_file, descr, format, nbr_page, edition, a.names as auteur, g.name as genre, bl.names as bl, p.name as publisher, b.statut 
        FROM tbl_books as b,tbl_publishers as p, tbl_genres as g, tbl_authors as a, tbl_books_language as bl 
        WHERE bl.id_book_language = b.id_book_language and b.id_genre = g.id_genre and b.id_author = a.id_author and p.publisher_id = b.publisher_id and b.id_book=?");
        $add->execute(array($id));
        $tbP =  $add->fetchObject();
        return $tbP;
    }
    
    public function viewBook($id)
    {
        $db = getConnection();
        $add = $db->prepare("SELECT id_book,book_file FROM tbl_books WHERE id_book=?");
        $add->execute(array($id));
        $tbP =  $add->fetchObject();
        return $tbP;
    }


    public function getUsername($email)
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT username FROM tbl_users WHERE username = ?");
        $statement->execute([$email]);
        $tbP = $statement->fetchObject();
        return $tbP;
    }

    //afficher utilisateur
    public function getUsers()
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_users WHERE statut = '1'");
        $statement->execute();
        $tbP = array();
        while ($data =  $statement->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    public function getAuthors()
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_authors");
        $statement->execute();
        $tbP = array();
        while ($data =  $statement->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    public function getAuthor($id)
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_authors where id_author=?");
        $statement->execute([$id]);
        $tbP =  $statement->fetchObject();
        return $tbP;
    }

    
    public function getCAuthorBook($id)
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT COUNT(*) as nb  FROM tbl_books as b,tbl_publishers as p, tbl_genres as g, tbl_authors as a, tbl_books_language as bl 
        WHERE bl.id_book_language = b.id_book_language and b.id_genre = g.id_genre and b.id_author = a.id_author and p.publisher_id = b.publisher_id and a.id_author=?");
        $statement->execute([$id]);
        $tbP =  $statement->fetchObject();
        return $tbP;
    } 
    
    public function getAuthorBook($id)
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT  id_book,qty, titre, typeDoc, isbn, book_file, descr, format, nbr_page, edition, a.names as auteur, g.name as genre, bl.names as bl, p.name as publisher, b.statut  FROM tbl_books as b,tbl_publishers as p, tbl_genres as g, tbl_authors as a, tbl_books_language as bl 
        WHERE bl.id_book_language = b.id_book_language and b.id_genre = g.id_genre and b.id_author = a.id_author and p.publisher_id = b.publisher_id and a.id_author=?");
        $statement->execute([$id]);
        $tbP =  $statement->fetchObject();
        return $tbP;
    } 

    public function deleteUser($id)
    {
        $db = getConnection();
        $sql = $db->prepare("DELETE FROM tbl_users WHERE id_user=?");
        $ok = $sql->execute(array($id));
        return $ok;
    }

    public function deleteBookGenre($id)
    {
        $db = getConnection();
        $sql = $db->prepare("DELETE FROM tbl_genres WHERE id_genre=?");
        $ok = $sql->execute(array($id));
        return $ok;
    }

    
    public function deleteBook($book)
    {
        $db = getConnection();
        $sql = $db->prepare("DELETE FROM tbl_books WHERE id_book=?");
        $ok = $sql->execute(array($book));
        return $ok;
    }

    public function deletePublisher($id)
    {
        $db = getConnection();
        $sql = $db->prepare("DELETE FROM tbl_publishers WHERE publisher_id=?");
        $ok = $sql->execute(array($id));
        return $ok;
    }

    public function deleteBLanguage($id)
    {
        $db = getConnection();
        $sql = $db->prepare("DELETE FROM tbl_books_language WHERE id_book_language=?");
        $ok = $sql->execute(array($id));
        return $ok;
    }

    public function deleteAuteur($id)
    {
        $db = getConnection();
        $sql = $db->prepare("DELETE FROM tbl_authors WHERE id_author=?");
        $ok = $sql->execute(array($id));
        return $ok;
    }

    public function validerEmprunt($date,$id)
    {
        $db = getConnection();
        $req = $db->prepare("UPDATE tbl_emprunts SET statut='2',returned='0',date_emprunt=? WHERE id_book=?");
        $d = $req->execute(array($date,$id));
        return $d;
    }    
    public function validerRetour($id)
    {
        $db = getConnection();
        $req = $db->prepare("UPDATE tbl_emprunts SET returned='1' WHERE id_book=?");
        $d = $req->execute(array($id));
        return $d;
    }
    public function refuserEmprunt($date,$id)
    {
        $db = getConnection();
        $req = $db->prepare("UPDATE tbl_emprunts SET statut='1',returned='1',date_emprunt=? WHERE id_book=?");
        $d = $req->execute(array($date,$id));
        return $d;
    }
    public function addQty($qty,$id)
    {
        $db = getConnection();
        $req = $db->prepare("UPDATE tbl_books SET qty=? WHERE id_book=?");
        $d = $req->execute(array($qty,$id));
        return $d;
    }
    public function desactUser($iduser)
    {
        $db = getConnection();
        $req = $db->prepare("UPDATE tbl_users SET statut='0' WHERE id_user=?");
        $d = $req->execute(array($iduser));
        return $d;
    }

    
//Show Doc Visits /Index
public function getDocVisits($id){
    $db = getConnection();
    $statement = $db->prepare("SELECT * FROM tbl_doc_visits WHERE doc_id =?");
    $statement->execute([$id]);
    $tbP = $statement->fetchObject();
    return $tbP;
}

//Display Total Doc Views 
public function TotalDocViews(){
    $db = getConnection();
    $statement = $db->prepare("SELECT SUM(nbr_visit) AS Total FROM tbl_doc_visits");
    $statement->execute();
    $tbP = array();
    while ($data =  $statement->fetchObject()) {
        $tbP[] = $data;
    }
    return $tbP;
}
}
