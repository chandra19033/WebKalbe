<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{

    protected $table = 'events';
    protected $allowedFields = ['Event_Title', 'Description', 'Date'];

    public function hapus($id)
    {
        $this->delete(['id' => $id]); {
            $builder = $this->db->table('events');
            $builder->select('*');
            return $builder->get();
        }
    }

    public function saveEvent($data)
    {
        $query = $this->db->table('events')->insert($data);
        return $query;
    }

    public function updateEvent($data, $id)
    {
        $query = $this->db->table('events')->update($data, array('id' => $id));
        return $query;
    }

    public function deleteEvent($id)
    {
        $query = $this->db->table('events')->delete(array('id' => $id));
        return $query;
    }

    public function getEvent()
    {
        $builder = $this->db->table('events');
        $builder->select('*');
        return $builder->get();
    }

    public function getNewEvent1()
    {
        $builder = $this->db->table('events');
        $builder->select('*')->limit(1)->orderby('id', "DESC");
        return $builder->get();
    }

    public function getNewEvent()
    {
        $this->where('Event_Title');
        return $this->first();
    }
}
