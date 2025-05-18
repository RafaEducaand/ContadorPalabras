<?php
namespace App;

class FuncionesWrapper
{
    public function asegurarUTF8($input)
    {
        return asegurarUTF8($input);
    }

    public function limpiarTexto($texto)
    {
        return limpiarTexto($texto);
    }

    public function eliminarTildes($texto)
    {
        return eliminarTildes($texto);
    }

    public function separarPalabras($texto)
    {
        return separarPalabras($texto);
    }

    public function contarPalabras(array $palabras)
    {
        return contarPalabras($palabras);
    }

    public function ordenarPorFrecuencia(array &$frecuencias)
    {
        ordenarPorFrecuencia($frecuencias);
    }

    public function analizarTexto($texto)
    {
        return analizarTexto($texto);
    }

    public function mostrarResultado(array $resultado)
    {
        mostrarResultado($resultado);
    }
    
}