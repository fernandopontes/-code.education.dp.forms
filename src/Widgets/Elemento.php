<?php

namespace Widgets;


class Elemento
{
    private $nome;
    private $propriedades;
    private $campos;

    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function __set($nome, $valor)
    {
        $this->propriedades[$nome] = $valor;
    }

    public function adicionar($campo)
    {
        $this->campos[] = $campo;
    }

    private function abrirTag()
    {
        if($this->nome != "form")
            print('<p>');

        printf('<%s', $this->nome);

        if($this->propriedades)
        {
            foreach($this->propriedades as $indice => $valor)
            {
                printf( ' %s="%s"', $indice, $valor);
            }
        }

        if($this->nome == 'input')
        {
            print('/>');
        }
        else {
            print('>');
        }

    }

    public function render()
    {
        $this->abrirTag();

        print("\n");

        if($this->campos)
        {
            foreach($this->campos as $item)
            {
                if(is_object($item))
                {
                    $item->render();
                }
                elseif((is_string($item)) || (is_numeric($item)))
                {
                    print($item);
                }
            }
        }

        print("\n");

        $this->fecharTag();
    }

    private function fecharTag()
    {
        if($this->nome != 'input')
            printf("</%s>\n", $this->nome);

        if($this->nome != "form")
            print('</p>');
    }
}