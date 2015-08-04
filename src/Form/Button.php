<?php

namespace Form;


class Button extends Campos
{
    private $action;
    private $label;
    private $formNome;

    public function setAction($action, $label)
    {
        $this->action = $action;
        $this->label = $label;
    }

    public function setFormName($nome)
    {
        $this->formNome = $nome;
    }

    public function render()
    {
        $this->tag->name = $this->nome;
        $this->tag->value = $this->label;
        $this->tag->type = 'button';

        if( ! parent::getEditavel())
        {
            $this->tag->disabled = "disabled";
        }

        $this->tag->render();
    }
}