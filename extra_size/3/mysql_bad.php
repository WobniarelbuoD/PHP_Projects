<?php
session_start();

//my sql start
error_reporting(E_ALL ^ E_WARNING);
$conn = mysqli_connect('localhost', 'root', '', 'klases_kebabas');
if (!mysqli_connect('localhost', 'root', '', 'klases_kebabas')) {
    die("Connection failed: " . mysqli_connect_error());
}
class Posts
{
    public function __construct(public $id, public $title, public $content, public $image, public $createdAt)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->createdAt = $createdAt;
    }

    public function getPosts()
    {
        $array = [];
        $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'klases_kebabas'), "
    SELECT * FROM blog
    ");
        while ($row = mysqli_fetch_assoc($result)) {
            array_push(
                $array[$result->id],
                new Posts(
                    $row['id'],
                    $row['title'],
                    $row['content'],
                    $row['image'],
                    $row['createdAt']
                )
            );
            var_dump($array);
        }
        return $array;
    }

    // function getPosts($id)
    // {
    //     $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'klases_kebabas'), "
    // SELECT * FROM blog
    // WHERE id = $id
    // ");
    //     $this->id = $result;
    //     $this->title = $title;
    //     $this->content = $content;
    //     $this->image = $image;
    //     $this->createdAt = $createdAt;

    //     return $this;
    // }

//     function getPostTitle($id)
//     {
//         $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'klases_kebabas'), "
//     SELECT title FROM blog
//     WHERE id = $id
//     ");
//         return $result;
//     }
// }

$test = new Posts();
$test->getPost(1)->getTitle()