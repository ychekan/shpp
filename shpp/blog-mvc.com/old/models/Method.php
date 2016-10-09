<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 07.09.2016
 * Time: 3:12
 */

namespace core\models;



class Method extends Insert
{
    private $load_dir = "./core/upload"; // directory for save images
    private $name; // Name image
    public $post; // Super global array $_POST

    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            /*$this->post = $_POST;
            self::html($this->post['tags']);
            self::inputForm();*/
            print_r($_POST);
        } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //print_r($_GET);
        }
    }

    /**
     * Switch for submit
     */
    public function inputForm()
    {
        switch ($this->post['submit']) {
            case "setArticle":
                self::setArticle();
                break;
            case "previewArticle":
                self::returnPostValue();
                break;
            case "registration":
                self::setRegisterUser();
                break;
            default :
                echo "not";
                break;
        }
    }

    /**
     * The set article in DB
     */
    private function setArticle()
    {
        unset($this->post['submit']);
        if (strlen($this->post['title']) > 3 && strlen($this->post['title']) < 255) {
            if (strlen($this->post['content']) > 10) {
                $this->post['tags'] = self::html($this->post['tags']);
                $this->post['uri'] = self::addImage($_FILES);
                parent::__construct('Article', $this->post);
                parent::setDataToDb();
                self::redirectUri();
            } else
                echo "<script type='application/javascript'>alert('Длина строки Content должна быть минимум 10 символа!');</script>";
        } else
            echo "<script type='application/javascript'>alert('Длина строки Title должна быть минимум 3 символа и максиму 255 символов!');</script>";
    }

    /**
     * The replace html spec. chars for save db
     * @param $text
     * @return
     */
    public function html($text)
    {
        return htmlspecialchars($text);
    }

    /**
     * The save image in directory
     * @param $_FILES
     * @return
     */
    protected function addImage($_FILES)
    {
        for ($i = 0; $i < count($_FILES['uri']['name']); ++$i) {
            $this->name = $_FILES['uri']['name'][$i];
            /** @noinspection PhpExpressionResultUnusedInspection */
            !move_uploaded_file($_FILES['uri']['tmp_name'][$i], "$this->load_dir/$this->name");
            $nameImg[] = $this->name;
        }
        return implode(',', $nameImg);
    }

    /**
     * Redirect to index.php
     */
    public function redirectUri()
    {
        echo '<script type="text/javascript">
            window.location.href = "./";
        </script>';
    }

    /**
     * The function for work out form register
     */
    public function setRegisterUser()
    {
        //print_r($this->post);
    }

    /**
     * Check whether the user name free
     */
    private function checkUserName($user)
    {
        // Проверяем на на існування такого юзера и e-mail
    }
}