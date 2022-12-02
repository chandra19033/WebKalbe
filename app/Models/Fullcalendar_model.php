<?php

namespace App\Models;

use CodeIgniter\Model;

class Fullcalendar_model extends Model
{
    protected $table = 'events';
    protected $allowedFields = ['title'];

    function fetch_all_event()
    {
        $this->orderBy('id');
        return $this->find('events');
    }

    function insert_event($data)
    {
        $this->insert('events', $data);
    }

    function update_event($data, $id)
    {
        $this->where('id', $id);
        $this->update('events', $data);
    }

    function delete_event($id)
    {
        $this->where('id', $id);
        $this->delete('events');
    }
}
