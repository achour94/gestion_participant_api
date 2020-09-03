<?php
namespace App\Table;

use App\Model\Category;
use App\Table\Exception\NotFoundException;
use PDO;

final class CategoryTable extends Table {

    protected $table = "category";
    protected $class = Category::class;

    public function hydratePosts (array $posts): void
    {
        //recupérer les categories associé à chaque articles
        //creer un tableau de posts avec ces id comme clé 
        $postsByID = [];
        foreach($posts as $post) {
            $post->setCategories([]);
            $postsByID[$post->getID()] = $post;
        }
        //récupérer les categories associé à ces ids
        $categories = $this->pdo
            ->query('SELECT c.*, pc.post_id
                     FROM post_category pc
                     JOIN category c ON c.id = pc.category_id
                     WHERE pc.post_id IN (' . implode(',', array_keys($postsByID)) . ')'
            )->fetchAll(PDO::FETCH_CLASS, $this->class);
        //associer chaque categorie a son post
        foreach($categories as $category) {
            $postsByID[$category->getPostID()]->addCategory($category);
        }
    }

    public function all (): array
    {
        return $this->queryAndFetchAll("SELECT * FROM {$this->table} ORDER BY id DESC");
        
    }

    public function list (): array
    {
        $categories = $this->queryAndFetchAll("SELECT * FROM {$this->table} ORDER BY name ASC");        ;
        $results = [];
        foreach($categories as $category) {
            $results[$category->getID()] = $category->getName();
        }
        return $results;
    }

}