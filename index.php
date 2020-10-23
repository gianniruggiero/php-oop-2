<?php

class User {
    protected $name;
    protected $lastname;
    protected $age;
    protected $nationality;
    protected $genre;
    protected $email;
    public $username;
    private $password;
    private $sconto;

    public function __construct ($_username, $_password, $_age) {
        $this->username = $_username;
        $this->password = $_password;
        $this->age = $_age;
    }

    public function setPersonalData ($_name, $_lastname, $_nationality, $_genre, $_email) {
        $this->name = $_name;
        $this->lastname = $_lastname;
        $this->nationality = $_nationality;
        $this->genre = $_genre;
        $this->email = $_email;
    }

    public function getUserData ($data) {
        return $this->$data;
    }

    public function setSconto () {
        if ($this->age < 45) {
            if ($this->genre == "f") {
                $this->sconto = 50;
            } else {
                $this->sconto = 30;
            }
        } else {
            $this->sconto = 5;
        }
    }
}

class BlogAuthor extends User {
    public $role;
    protected $postsNumber;
    protected $firstPostDate;
    protected $tags;

    public function setAuthordata ($_role, $_postsNumber, $_firstPostDate, $_tags) {
        $this->role = $_role;
        $this->postsNumber = $_postsNumber;
        $this->firstPostDate = $_firstPostDate;
        $this->tags = $_tags;
    }

    public function getAuthorData ($data) {
        return $this->$data;
    }

}


$user1 = new User("gianni1", "dadadsada", 45);
$user1-> setPersonalData("Gianni", "Ruggiero", "Italian", "m", "gianni@getmail.com");
$user1->setSconto();

$user2 = new User("bloodymary", "m666", 19);
$user2-> setPersonalData("Maria", "Rossi", "Italian", "f", "mariar@getmail.com");
$user2->setSconto();

$user3 = new User("gheart34", "cqeqwewq", 23);
$user3-> setPersonalData("George", "Bridges", "English", "m", "george@getmail.com");
$user3->setSconto();

$user4 = new User("frank-43", "nnmrmmere", 13);
$user4-> setPersonalData("Franco", "Pazzini", "Italian", "m", "pazzfr@getmail.com");
$user4->setSconto();

$user5 = new User("carlapert", "crl234", 26);
$user5-> setPersonalData("Carla", "Pertica", "Italian", "f", "carla.pertica@getmail.com");
$user5->setSconto();

$user6 = new User("betty543", "btt14", 17);
$user6-> setPersonalData("Betty", "Love", "American", "f", "betty.love@getmail.com");
$user6->setSconto();

$utenti = [$user1, $user2, $user3, $user4, $user5, $user6];

$author1 = new BlogAuthor ("marktw", "fnae_45", 32);
$author1-> setPersonalData("Mark", "Twain", "Italian", "m", "mark.twain@getmail.com");
$author1-> setAuthordata("admin", "34", "2018-10-21", "php, laravel, node js, react, css, js, html");

$author2 = new BlogAuthor ("demimmm", "men32vf", 19);
$author2-> setPersonalData("Demi", "Ravenue", "french", "f", "demione@getmail.com");
$author2-> setAuthordata("editor", "5", "2020-09-01", "html, css, js");

$author3 = new BlogAuthor ("luisered", "adaswae_45", 27);
$author3-> setPersonalData("Luise", "Redcarpet", "american", "f", "luiserc@getmail.com");
$author3-> setAuthordata("editor", "24", "2019-01-07", "php, laravel, node js");

$authors = [$author1, $author2, $author3];

//echo $author1->getAuthorData("name"); die;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>PHP-OOP-2</title>
</head>
<body>
    <main>
        <h1>Blog Users List</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Lastname</th>
                <th>Age</th>
                <th>Nationality</th>
                <th>Genre</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Sconto</th>
            </tr>
            <?php foreach ($utenti as $user) {?>
                <tr>
                    <td><?php echo $user->getUserData("name") ?></td>
                    <td><?php echo $user->getUserData("lastname") ?></td>
                    <td><?php echo $user->getUserData("age")?></td>
                    <td><?php echo $user->getUserData("nationality")?></td>
                    <td><?php echo $user->getUserData("genre")?></td>
                    <td><?php echo $user->getUserData("email")?></td>
                    <td><?php echo $user->username?></td>
                    <td><?php echo $user->getUserData("password")?></td>
                    <td><?php echo $user->getUserData("sconto")?>%</td>
                </tr>
            <?php }; ?>
        </table>
        <br>
        <h1>Blog Authors List</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Lastname</th>
                <th>Age</th>
                <th>Nationality</th>
                <th>Genre</th>
                <th>Username</th>
                <th>Role</th>
                <th># Published Posts</th>
                <th>Author from</th>
                <th>Tags</th>
            </tr>
            <?php foreach ($authors as $author) {?>
                <tr>
                    <td><?php echo $author->getUserData("name") ?></td>
                    <td><?php echo $author->getUserData("lastname")?></td>
                    <td><?php echo $author->getUserData("age")?></td>
                    <td><?php echo $author->getUserData("nationality")?></td>
                    <td><?php echo $author->getUserData("genre")?></td>
                    <td><?php echo $author->username?></td>
                    <td><?php echo $author->role?></td>
                    <td><?php echo $author->getUserData("postsNumber")?></td>
                    <td><?php echo $author->getUserData("firstPostDate")?></td>
                    <td><?php echo $author->getUserData("tags")?></td>
                </tr>
            <?php }; ?>
        </table>
    </main>
    
</body>
</html>