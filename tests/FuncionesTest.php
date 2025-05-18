<?php

namespace Tests;

use PHPUnit\Framework\Attributes\CoversFunction;
use PHPUnit\Framework\TestCase;

use function App\asegurarUTF8;
use function App\limpiarTexto;
use function App\eliminarTildes;
use function App\separarPalabras;
use function App\contarPalabras;
use function App\ordenarPorFrecuencia;


require_once __DIR__ . '/../vendor/autoload.php';

#[CoversFunction('App\\asegurarUTF8')]
#[CoversFunction('App\\limpiarTexto')]
#[CoversFunction('App\\eliminarTildes')]
#[CoversFunction('App\\separarPalabras')]
#[CoversFunction('App\\contarPalabras')]
#[CoversFunction('App\\ordenarPorFrecuencia')]
class FuncionesTest extends TestCase
{
    public function testAsegurarUTF8()
    {
        $this->assertEquals('hola', asegurarUTF8('hola'));
        $this->assertEquals('¡hola!', asegurarUTF8(utf8_decode('¡hola!')));
    }

    public function testLimpiarTexto()
    {
        $this->assertEquals('hola mundo', limpiarTexto('¡Hola, mundo!'));
        $this->assertEquals('el niño juega', limpiarTexto('El niño juega.'));
    }

    public function testEliminarTildes()
    {
        $this->assertEquals('arbol', eliminarTildes('árbol'));
        $this->assertEquals('niño', eliminarTildes('niño'));
    }

    public function testSepararPalabras()
    {
        $this->assertEquals(['hola', 'mundo'], separarPalabras('hola mundo'));
        $this->assertEquals(['uno', 'dos', 'tres'], separarPalabras('uno   dos   tres'));
    }

    public function testContarPalabras()
    {
        file_put_contents(__DIR__ . '/../stopwords.txt', "y\nla\nde");
        $resultado = contarPalabras(['hola', 'mundo', 'y', 'la', 'mundo', 'de', 'hola']);
        $this->assertEquals(['hola' => 2, 'mundo' => 2], $resultado);
    }

    public function testOrdenarPorFrecuencia()
    {
        $frecuencias = ['hola' => 1, 'mundo' => 3, 'php' => 2];
        ordenarPorFrecuencia($frecuencias);
        $this->assertEquals(['mundo' => 3, 'php' => 2, 'hola' => 1], $frecuencias);
    }
}
