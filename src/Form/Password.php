<?php

namespace Form;


class Password extends Campos
{
    public function render()
    {
        $this->tag->name = $this->nome;
        $this->tag->value = $this->valor;
        $this->tag->type = 'password';

        if( ! parent::getEditavel())
        {
            $this->tag->readonly = "readonly";
        }

        $this->tag->render();
    }
}