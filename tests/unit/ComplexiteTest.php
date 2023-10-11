<?php

namespace App\Tests;

use App\Fonctions;
use PHPUnit\Framework\TestCase;

class ComplexiteTest extends TestCase
{
    /**
     * @test
     */
    public function aubry_nbBits_correcte()
    {

        $this->assertEquals(24,Fonctions\CalculComplexiteMdp("aubry"));
    }
    /**
     * @test
     */
    public function superaubry_nbBits_correcte()
    {
        $this->assertEquals(57,Fonctions\CalculComplexiteMdp("super@ubry"));
    }

    /**
     * @test
     */
    public function Superaubry2022_nbBits_correcte()
    {
        $this->assertEquals(90,Fonctions\CalculComplexiteMdp("Super@ubry2022"));
    }

    /**
     * @test
     */
    public function GiroudPresident2027_nbBits_correcte()
    {
        $this->assertEquals(148,Fonctions\CalculComplexiteMdp("Giroud-Président||2027"));
    }
}