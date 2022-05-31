<?php

namespace BuriPHP\Core\Models;

defined('_EXEC') or die;

class Pages
{
    use \BuriPHP\System\Libraries\Model;

    public function get_gallery($id = null)
    {
        if (is_null($id))
            return false;

        return $this->database->select('media', [
            'id',
            'media (image)',
        ], [
            'id' => $this->database->select('mygalleries', [
                'id',
                'name',
                'description',
                'ids [Object]',
            ], [
                'id' => $id
            ])[0]['ids']
        ]);
    }

    public function get_services($id = null)
    {
        $where = [
            'status[!]' => 'removed',
            'ORDER' => [
                'myservices.publication_date' => 'DESC'
            ]
        ];

        if (
            !is_null($id)
        ) {
            $where['myservices.url'] = $id;
        }

        return $this->database->select("myservices", [
            "[>]myservices_categories" => [
                "id_category" => "id"
            ],
            "[>]users" => [
                "author" => "id"
            ]
        ], [
            'myservices.id',
            'myservices.url',
            'myservices.title',
            'myservices_categories.title(category) [Object] ',
            'myservices.id_category',
            'myservices.lang',
            'myservices.image',
            'myservices.content',
            'myservices.sm_title',
            'myservices.sm_description',
            'myservices.sm_image',
            'myservices.tags [Object]',
            'myservices.status',
            'myservices.publication_date',
            'users.username',
        ], $where);
    }
}