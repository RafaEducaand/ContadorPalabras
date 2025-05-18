<?php

namespace Tests;

use PHPUnit\Framework\Attributes\CoversFunction;
use PHPUnit\Framework\TestCase;

use function App\asegurarUTF8;
use function App\limpiarTexto;
use function App\eliminarTildes;

require_once __DIR__ . '/../vendor/autoload.php';

#[CoversFunction('App\\asegurarUTF8')]
#[CoversFunction('App\\limpiarTexto')]
#[CoversFunction('App\\eliminarTildes')]
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
}
