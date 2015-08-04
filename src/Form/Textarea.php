<?php

namespace Form;


use Widgets\Elemento;

class Textarea extends Campos
{
    public function __construct($nome)
    {
        parent::__construct($nome);

        $this->tag = new Elemento('textarea');
    }

    public function render()
    {
        $this->tag->name = $this->nome;

        if( ! parent::getEditavel())
        {
            $this->tag->readonly = "readonly";
        }

        $this->tag->adicionar(htmlspecialchars($this->valor));

        $this->tag->render();
    }
}