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
use function App\analizarTexto;
use function App\mostrarResultado;

require_once __DIR__ . '/../vendor/autoload.php';

#[CoversFunction('App\\asegurarUTF8')]
#[CoversFunction('App\\limpiarTexto')]
#[CoversFunction('App\\eliminarTildes')]
#[CoversFunction('App\\contarPalabras')]
#[CoversFunction('App\\ordenarPorFrecuencia')]
#[CoversFunction('App\\analizarTexto')]
#[CoversFunction('App\\mostrarResultado')]
class FuncionesTest extends TestCase
{
    public function testAsegurarUTF8()
    {
        $this->assertEquals('hola', asegurarUTF8('hola'));
        $this->assertEquals('¡hola!', asegurarUTF8(utf8_decode('¡hola!')));
        $this->assertEquals('', asegurarUTF8(null));
        $this->assertEquals('', asegurarUTF8([]));
    }

    public function testLimpiarTexto()
    {
        $this->assertEquals('hola mundo', limpiarTexto('¡Hola, mundo!'));
        $this->assertEquals('el nino juega', limpiarTexto('El niño juega.'));
        $this->assertEquals('texto limpio', limpiarTexto('texto limpio'));
        $this->assertEquals('', limpiarTexto(null));
        $this->assertEquals('', limpiarTexto([]));
    }

    public function testEliminarTildes()
    {
        $this->assertEquals('arbol', eliminarTildes('árbol'));
        $this->assertEquals('nino', eliminarTildes('niño'));
        $this->assertEquals('texto limpio', eliminarTildes('texto limpio'));
        $this->assertEquals('', eliminarTildes(null));
    }


    public function testContarPalabras()
    {
        file_put_contents(__DIR__ . '/../stopwords.txt', "y\nla\nde");

        $resultado = contarPalabras(['hola', 'mundo', 'y', 'la', 'mundo', 'de', 'hola']);
        $this->assertEquals(['hola' => 2, 'mundo' => 2], $resultado);
    }

    public function testContarPalabrasSinStopwords()
    {
        @unlink(__DIR__ . '/../stopwords.txt');

        $resultado = contarPalabras(['hola', 'hola', 'mundo']);
        $this->assertEquals(['hola' => 2, 'mundo' => 1], $resultado);
    }

    public function testContarPalabrasVacia()
    {
        $this->assertEquals([], contarPalabras([]));
    }

    public function testOrdenarPorFrecuencia()
    {
        $frecuencias = ['hola' => 1, 'mundo' => 3, 'php' => 2];
        ordenarPorFrecuencia($frecuencias);
        $this->assertEquals(['mundo' => 3, 'php' => 2, 'hola' => 1], $frecuencias);
    }
    

    public function testAnalizarTextoVacio()
    {
        $this->assertEquals([], analizarTexto(''));
    }

    public function testMostrarResultado()
    {
        ob_start();
        mostrarResultado(['palabra1' => 3, 'palabra2' => 2]);
        $output = ob_get_clean();

        $this->assertStringContainsString('palabra1', $output);
        $this->assertStringContainsString('3', $output);
        $this->assertStringContainsString('palabra2', $output);
        $this->assertStringContainsString('2', $output);
    }

    public function testMostrarResultadoVacio()
    {
        ob_start();
        mostrarResultado([]);
        $output = ob_get_clean();

        $this->assertEmpty(trim($output));
    }
}
