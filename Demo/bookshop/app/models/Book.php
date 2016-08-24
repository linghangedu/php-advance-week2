<?php

class Book//class需要new 来实体化，
{
    public $id;  //但是class里面的参数只需要这么声明
    public $title;
    public $author;
    public $description;
    public $price;
    public $rating;
    public $picture;
    public $category;

    function __construct(
        $id,//function里面的参数
        $author,
        $category,
        $description,
        $picture,
        $price,
        $rating,
        $title
    ) {
        $this->id          = $id;//function里面的功能：调用当前clas里面的id属性，并且赋值
        $this->author      = $author;
        $this->category    = $category;
        $this->description = $description;
        $this->picture     = $picture;
        $this->price       = $price;
        $this->rating      = $rating;
        $this->title       = $title;
    }
}

?>