<?php

namespace PushLogicLtd\MapBoxAPILaravel\Models;

class Dataset extends JSONModel
{
    public $owner;
    public $id;
    public $created;
    public $modified;
    public $bounds;
    public $features;
    public $size;
    public $name;
    public $description;

    public function jsonSerialize()
    {
        return [
            'owner'       => $this->owner,
            'id'          => $this->id,
            'created'     => $this->created,
            'modified'    => $this->modified,
            'bounds'      => $this->bounds,
            'features'    => $this->features,
            'size'        => $this->size,
            'name'        => $this->name,
            'description' => $this->description
        ];
    }
}
