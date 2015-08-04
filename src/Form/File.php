<?php

namespace Form;


class File extends Campos
{
    public function render()
    {
        $this->tag->name = $this->nome;
        $this->tag->value = $this->valor;
        $this->tag->type = 'file';

        if( ! parent::getEditavel())
        {
            $this->tag->readonly = "readonly";
        }

        $this->tag->render();
    }
}