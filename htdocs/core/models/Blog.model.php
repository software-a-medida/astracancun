<?php

namespace BuriPHP\Core\Models;

defined('_EXEC') or die;

class Blog
{
    use \BuriPHP\System\Libraries\Model;

    public function get($id = null)
    {
        $where = [
            'status[!]' => 'removed',
            'ORDER' => [
                'blog.publication_date' => 'DESC'
            ]
        ];

        if (
            !is_null($id)
        ) {
            $where['blog.url'] = $id;
        }

        return $this->database->select("blog", [
            "[>]blog_categories" => [
                "id_category" => "id"
            ],
            "[>]users" => [
                "author" => "id"
            ]
        ], [
            'blog.id',
            'blog.url',
            'blog.title',
            'blog_categories.title(category) [Object] ',
            'blog.id_category',
            'blog.image',
            'blog.content',
            'blog.sm_title',
            'blog.sm_description',
            'blog.sm_image',
            'blog.tags [Object]',
            'blog.status',
            'blog.publication_date',
            'users.username',
        ], $where);
    }
}