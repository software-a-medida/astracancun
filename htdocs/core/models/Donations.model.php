<?php

namespace BuriPHP\Core\Models;

defined('_EXEC') or die;

class Donations
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
}