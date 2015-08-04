<?php

namespace Form;


use Widgets\Elemento;

class Combo extends Campos
{
    private $itens;

    public function __construct($nome)
    {
        parent::__construct($nome);

        $this->tag = new Elemento('select');
    }

    public function addItens($itens)
    {
        $this->itens = $itens;
    }

    public function render()
    {
        $this->tag->name = $this->nome;

        // Cria uma tag <option>
        $option = new Elemento('option');
        $option->adicionar('Selecione um item');
        $option->value = 0;

        // Adiciona a opção ao combo
        $this->tag->adicionar($option);

        if($this->itens)
        {
            foreach($this->itens as $indice => $item)
            {
                // Cria uma tag <option>
                $option = new Elemento('option');
                $option->value = $indice;
                $option->adicionar($item);

                // Caso seja a opção selecionada
                if($indice == $this->valor)
                {
                    $option->selected = "selected";
                }

                $this->tag->adicionar($option);

            }
        }

        if( ! parent::getEditavel())
        {
            $this->tag->readonly = "readonly";
        }

        $this->tag->render();
    }
}