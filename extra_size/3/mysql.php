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
    public $posts = [];
    public $id;
    public $title;
    public $content;
    public $image; 
    public $createdAt;

    public function __construct()
    {
    }

    public function getPosts()
    {
        $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'klases_kebabas'), "
        SELECT * FROM blog
        ");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $this->posts[$row['id']] = $row;
            }
        }
        return $this;
    }

    public function getPost($id) 
    {
        $this->id = $id;
        $this->title = $this->posts[$id]['title'];
        $this->content = $this->posts[$id]['content'];
        $this->image = $this->posts[$id]['image'];
        $this->createdAt = $this->posts[$id]['createdAt'];
        // var_dump($this->posts[$id]);
        return $this;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function createPost($title, $content, $image)
    {
        mysqli_query(mysqli_connect('localhost', 'root', '', 'klases_kebabas'), "
        INSERT INTO klases_kebabas.blog
        (title,content,image)
        VALUES (
        '" . $title . "',
        '" . $content . "',
        '" . $image . "'
    );
        ");

    }




}
