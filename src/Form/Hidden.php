<?php

namespace Form;


class Hidden extends Campos
{
    public function render()
    {
        $this->tag->name = $this->nome;
        $this->tag->value = $this->valor;
        $this->tag->type = 'hidden';

        $this->tag->render();
    }
}