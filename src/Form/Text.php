<?php

namespace Form;


class Text extends Campos
{
    public function render()
    {
        $this->tag->name = $this->nome;
        $this->tag->value = $this->valor;
        $this->tag->type = 'text';

        if( ! parent::getEditavel())
        {
            $this->tag->readonly = "readonly";
        }

        $this->tag->render();
    }
}