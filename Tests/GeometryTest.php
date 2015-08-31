<?php
/*
* This file is part of the OrbitaleImageMagickPHP package.
*
* (c) Alexandre Rock Ancelet <alex@orbitale.io>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Orbitale\Component\ImageMagick\Tests;

use Orbitale\Component\ImageMagick\Command;
use Orbitale\Component\ImageMagick\ReferenceClasses\Geometry;

class GeometryTest extends AbstractTestCase
{

    /**
     * @dataProvider provideRightGeometries
     */
    public function testGeometry($width, $height, $x, $y, $aspectRatio)
    {
        $geometry = new Geometry($width, $height, $x, $y, $aspectRatio);
        $this->assertInternalType('string', $geometry->validate());

        if ($geometry->validate()) {
            $command = new Command(IMAGEMAGICK_DIR);

            $command
                ->convert($this->resourcesDir.'/moon_180.jpg')
                ->resize($geometry)
                ->file($this->resourcesDir.'/outputs/moon_180_test_geometry_'.uniqid($width.$height.$x.$y.$aspectRatio.'test_geo', true).'.jpg', false);

            $response = $command->run(true);

            $this->assertFalse($response->hasFailed(), "For geometry ".$geometry->validate().", ImageMagick error:\n".$response->getContent(true));
        }
    }

    public function provideRightGeometries()
    {
        // width, height, x, y, aspectRatio
        return array(
            array(null, null, null, null, '<'),
            array(null, null, null, null, '!'),
            array(null, null, null, null, '^'),
            array(null, null, null, null, '>'),
            array(null, null, null, null, null),
            array(null, null, null, 0, null),
            array(null, null, null, 0, '<'),
            array(null, null, null, 0, '!'),
            array(null, null, null, 0, '^'),
            array(null, null, null, 0, '>'),
            array(null, null, null, -1, null),
            array(null, null, null, -1, '<'),
            array(null, null, null, -1, '!'),
            array(null, null, null, -1, '^'),
            array(null, null, null, -1, '>'),
            array(null, null, null, 1, null),
            array(null, null, null, 1, '<'),
            array(null, null, null, 1, '!'),
            array(null, null, null, 1, '^'),
            array(null, null, null, 1, '>'),
            array(null, null, 0, null, null),
            array(null, null, 0, null, '<'),
            array(null, null, 0, null, '!'),
            array(null, null, 0, null, '^'),
            array(null, null, 0, null, '>'),
            array(null, null, 0, 0, null),
            array(null, null, 0, 0, '<'),
            array(null, null, 0, 0, '!'),
            array(null, null, 0, 0, '^'),
            array(null, null, 0, 0, '>'),
            array(null, null, 0, -1, null),
            array(null, null, 0, -1, '<'),
            array(null, null, 0, -1, '!'),
            array(null, null, 0, -1, '^'),
            array(null, null, 0, -1, '>'),
            array(null, null, 0, 1, null),
            array(null, null, 0, 1, '<'),
            array(null, null, 0, 1, '!'),
            array(null, null, 0, 1, '^'),
            array(null, null, 0, 1, '>'),
            array(null, null, -1, null, null),
            array(null, null, -1, null, '<'),
            array(null, null, -1, null, '!'),
            array(null, null, -1, null, '^'),
            array(null, null, -1, null, '>'),
            array(null, null, -1, 0, null),
            array(null, null, -1, 0, '<'),
            array(null, null, -1, 0, '!'),
            array(null, null, -1, 0, '^'),
            array(null, null, -1, 0, '>'),
            array(null, null, -1, -1, null),
            array(null, null, -1, -1, '<'),
            array(null, null, -1, -1, '!'),
            array(null, null, -1, -1, '^'),
            array(null, null, -1, -1, '>'),
            array(null, null, -1, 1, null),
            array(null, null, -1, 1, '<'),
            array(null, null, -1, 1, '!'),
            array(null, null, -1, 1, '^'),
            array(null, null, -1, 1, '>'),
            array(null, null, 1, null, null),
            array(null, null, 1, null, '<'),
            array(null, null, 1, null, '!'),
            array(null, null, 1, null, '^'),
            array(null, null, 1, null, '>'),
            array(null, null, 1, 0, null),
            array(null, null, 1, 0, '<'),
            array(null, null, 1, 0, '!'),
            array(null, null, 1, 0, '^'),
            array(null, null, 1, 0, '>'),
            array(null, null, 1, -1, null),
            array(null, null, 1, -1, '<'),
            array(null, null, 1, -1, '!'),
            array(null, null, 1, -1, '^'),
            array(null, null, 1, -1, '>'),
            array(null, null, 1, 1, null),
            array(null, null, 1, 1, '<'),
            array(null, null, 1, 1, '!'),
            array(null, null, 1, 1, '^'),
            array(null, null, 1, 1, '>'),
            array(null, 0, null, null, null),
            array(null, 0, null, null, '<'),
            array(null, 0, null, null, '!'),
            array(null, 0, null, null, '^'),
            array(null, 0, null, null, '>'),
            array(null, 0, null, 0, null),
            array(null, 0, null, 0, '<'),
            array(null, 0, null, 0, '!'),
            array(null, 0, null, 0, '^'),
            array(null, 0, null, 0, '>'),
            array(null, 0, null, -1, null),
            array(null, 0, null, -1, '<'),
            array(null, 0, null, -1, '!'),
            array(null, 0, null, -1, '^'),
            array(null, 0, null, -1, '>'),
            array(null, 0, null, 1, null),
            array(null, 0, null, 1, '<'),
            array(null, 0, null, 1, '!'),
            array(null, 0, null, 1, '^'),
            array(null, 0, null, 1, '>'),
            array(null, 0, 0, null, null),
            array(null, 0, 0, null, '<'),
            array(null, 0, 0, null, '!'),
            array(null, 0, 0, null, '^'),
            array(null, 0, 0, null, '>'),
            array(null, 0, 0, 0, null),
            array(null, 0, 0, 0, '<'),
            array(null, 0, 0, 0, '!'),
            array(null, 0, 0, 0, '^'),
            array(null, 0, 0, 0, '>'),
            array(null, 0, 0, -1, null),
            array(null, 0, 0, -1, '<'),
            array(null, 0, 0, -1, '!'),
            array(null, 0, 0, -1, '^'),
            array(null, 0, 0, -1, '>'),
            array(null, 0, 0, 1, null),
            array(null, 0, 0, 1, '<'),
            array(null, 0, 0, 1, '!'),
            array(null, 0, 0, 1, '^'),
            array(null, 0, 0, 1, '>'),
            array(null, 0, -1, null, null),
            array(null, 0, -1, null, '<'),
            array(null, 0, -1, null, '!'),
            array(null, 0, -1, null, '^'),
            array(null, 0, -1, null, '>'),
            array(null, 0, -1, 0, null),
            array(null, 0, -1, 0, '<'),
            array(null, 0, -1, 0, '!'),
            array(null, 0, -1, 0, '^'),
            array(null, 0, -1, 0, '>'),
            array(null, 0, -1, -1, null),
            array(null, 0, -1, -1, '<'),
            array(null, 0, -1, -1, '!'),
            array(null, 0, -1, -1, '^'),
            array(null, 0, -1, -1, '>'),
            array(null, 0, -1, 1, null),
            array(null, 0, -1, 1, '<'),
            array(null, 0, -1, 1, '!'),
            array(null, 0, -1, 1, '^'),
            array(null, 0, -1, 1, '>'),
            array(null, 0, 1, null, null),
            array(null, 0, 1, null, '<'),
            array(null, 0, 1, null, '!'),
            array(null, 0, 1, null, '^'),
            array(null, 0, 1, null, '>'),
            array(null, 0, 1, 0, null),
            array(null, 0, 1, 0, '<'),
            array(null, 0, 1, 0, '!'),
            array(null, 0, 1, 0, '^'),
            array(null, 0, 1, 0, '>'),
            array(null, 0, 1, -1, null),
            array(null, 0, 1, -1, '<'),
            array(null, 0, 1, -1, '!'),
            array(null, 0, 1, -1, '^'),
            array(null, 0, 1, -1, '>'),
            array(null, 0, 1, 1, null),
            array(null, 0, 1, 1, '<'),
            array(null, 0, 1, 1, '!'),
            array(null, 0, 1, 1, '^'),
            array(null, 0, 1, 1, '>'),
            array(null, 100, null, null, null),
            array(null, 100, null, null, '<'),
            array(null, 100, null, null, '!'),
            array(null, 100, null, null, '^'),
            array(null, 100, null, null, '>'),
            array(null, 100, null, 0, null),
            array(null, 100, null, 0, '<'),
            array(null, 100, null, 0, '!'),
            array(null, 100, null, 0, '^'),
            array(null, 100, null, 0, '>'),
            array(null, 100, null, -1, null),
            array(null, 100, null, -1, '<'),
            array(null, 100, null, -1, '!'),
            array(null, 100, null, -1, '^'),
            array(null, 100, null, -1, '>'),
            array(null, 100, null, 1, null),
            array(null, 100, null, 1, '<'),
            array(null, 100, null, 1, '!'),
            array(null, 100, null, 1, '^'),
            array(null, 100, null, 1, '>'),
            array(null, 100, 0, null, null),
            array(null, 100, 0, null, '<'),
            array(null, 100, 0, null, '!'),
            array(null, 100, 0, null, '^'),
            array(null, 100, 0, null, '>'),
            array(null, 100, 0, 0, null),
            array(null, 100, 0, 0, '<'),
            array(null, 100, 0, 0, '!'),
            array(null, 100, 0, 0, '^'),
            array(null, 100, 0, 0, '>'),
            array(null, 100, 0, -1, null),
            array(null, 100, 0, -1, '<'),
            array(null, 100, 0, -1, '!'),
            array(null, 100, 0, -1, '^'),
            array(null, 100, 0, -1, '>'),
            array(null, 100, 0, 1, null),
            array(null, 100, 0, 1, '<'),
            array(null, 100, 0, 1, '!'),
            array(null, 100, 0, 1, '^'),
            array(null, 100, 0, 1, '>'),
            array(null, 100, -1, null, null),
            array(null, 100, -1, null, '<'),
            array(null, 100, -1, null, '!'),
            array(null, 100, -1, null, '^'),
            array(null, 100, -1, null, '>'),
            array(null, 100, -1, 0, null),
            array(null, 100, -1, 0, '<'),
            array(null, 100, -1, 0, '!'),
            array(null, 100, -1, 0, '^'),
            array(null, 100, -1, 0, '>'),
            array(null, 100, -1, -1, null),
            array(null, 100, -1, -1, '<'),
            array(null, 100, -1, -1, '!'),
            array(null, 100, -1, -1, '^'),
            array(null, 100, -1, -1, '>'),
            array(null, 100, -1, 1, null),
            array(null, 100, -1, 1, '<'),
            array(null, 100, -1, 1, '!'),
            array(null, 100, -1, 1, '^'),
            array(null, 100, -1, 1, '>'),
            array(null, 100, 1, null, null),
            array(null, 100, 1, null, '<'),
            array(null, 100, 1, null, '!'),
            array(null, 100, 1, null, '^'),
            array(null, 100, 1, null, '>'),
            array(null, 100, 1, 0, null),
            array(null, 100, 1, 0, '<'),
            array(null, 100, 1, 0, '!'),
            array(null, 100, 1, 0, '^'),
            array(null, 100, 1, 0, '>'),
            array(null, 100, 1, -1, null),
            array(null, 100, 1, -1, '<'),
            array(null, 100, 1, -1, '!'),
            array(null, 100, 1, -1, '^'),
            array(null, 100, 1, -1, '>'),
            array(null, 100, 1, 1, null),
            array(null, 100, 1, 1, '<'),
            array(null, 100, 1, 1, '!'),
            array(null, 100, 1, 1, '^'),
            array(null, 100, 1, 1, '>'),
            array(0, null, null, null, null),
            array(0, null, null, null, '<'),
            array(0, null, null, null, '!'),
            array(0, null, null, null, '^'),
            array(0, null, null, null, '>'),
            array(0, null, null, 0, null),
            array(0, null, null, 0, '<'),
            array(0, null, null, 0, '!'),
            array(0, null, null, 0, '^'),
            array(0, null, null, 0, '>'),
            array(0, null, null, -1, null),
            array(0, null, null, -1, '<'),
            array(0, null, null, -1, '!'),
            array(0, null, null, -1, '^'),
            array(0, null, null, -1, '>'),
            array(0, null, null, 1, null),
            array(0, null, null, 1, '<'),
            array(0, null, null, 1, '!'),
            array(0, null, null, 1, '^'),
            array(0, null, null, 1, '>'),
            array(0, null, 0, null, null),
            array(0, null, 0, null, '<'),
            array(0, null, 0, null, '!'),
            array(0, null, 0, null, '^'),
            array(0, null, 0, null, '>'),
            array(0, null, 0, 0, null),
            array(0, null, 0, 0, '<'),
            array(0, null, 0, 0, '!'),
            array(0, null, 0, 0, '^'),
            array(0, null, 0, 0, '>'),
            array(0, null, 0, -1, null),
            array(0, null, 0, -1, '<'),
            array(0, null, 0, -1, '!'),
            array(0, null, 0, -1, '^'),
            array(0, null, 0, -1, '>'),
            array(0, null, 0, 1, null),
            array(0, null, 0, 1, '<'),
            array(0, null, 0, 1, '!'),
            array(0, null, 0, 1, '^'),
            array(0, null, 0, 1, '>'),
            array(0, null, -1, null, null),
            array(0, null, -1, null, '<'),
            array(0, null, -1, null, '!'),
            array(0, null, -1, null, '^'),
            array(0, null, -1, null, '>'),
            array(0, null, -1, 0, null),
            array(0, null, -1, 0, '<'),
            array(0, null, -1, 0, '!'),
            array(0, null, -1, 0, '^'),
            array(0, null, -1, 0, '>'),
            array(0, null, -1, -1, null),
            array(0, null, -1, -1, '<'),
            array(0, null, -1, -1, '!'),
            array(0, null, -1, -1, '^'),
            array(0, null, -1, -1, '>'),
            array(0, null, -1, 1, null),
            array(0, null, -1, 1, '<'),
            array(0, null, -1, 1, '!'),
            array(0, null, -1, 1, '^'),
            array(0, null, -1, 1, '>'),
            array(0, null, 1, null, null),
            array(0, null, 1, null, '<'),
            array(0, null, 1, null, '!'),
            array(0, null, 1, null, '^'),
            array(0, null, 1, null, '>'),
            array(0, null, 1, 0, null),
            array(0, null, 1, 0, '<'),
            array(0, null, 1, 0, '!'),
            array(0, null, 1, 0, '^'),
            array(0, null, 1, 0, '>'),
            array(0, null, 1, -1, null),
            array(0, null, 1, -1, '<'),
            array(0, null, 1, -1, '!'),
            array(0, null, 1, -1, '^'),
            array(0, null, 1, -1, '>'),
            array(0, null, 1, 1, null),
            array(0, null, 1, 1, '<'),
            array(0, null, 1, 1, '!'),
            array(0, null, 1, 1, '^'),
            array(0, null, 1, 1, '>'),
            array(0, 0, null, null, null),
            array(0, 0, null, null, '<'),
            array(0, 0, null, null, '!'),
            array(0, 0, null, null, '^'),
            array(0, 0, null, null, '>'),
            array(0, 0, null, 0, null),
            array(0, 0, null, 0, '<'),
            array(0, 0, null, 0, '!'),
            array(0, 0, null, 0, '^'),
            array(0, 0, null, 0, '>'),
            array(0, 0, null, -1, null),
            array(0, 0, null, -1, '<'),
            array(0, 0, null, -1, '!'),
            array(0, 0, null, -1, '^'),
            array(0, 0, null, -1, '>'),
            array(0, 0, null, 1, null),
            array(0, 0, null, 1, '<'),
            array(0, 0, null, 1, '!'),
            array(0, 0, null, 1, '^'),
            array(0, 0, null, 1, '>'),
            array(0, 0, 0, null, null),
            array(0, 0, 0, null, '<'),
            array(0, 0, 0, null, '!'),
            array(0, 0, 0, null, '^'),
            array(0, 0, 0, null, '>'),
            array(0, 0, 0, 0, null),
            array(0, 0, 0, 0, '<'),
            array(0, 0, 0, 0, '!'),
            array(0, 0, 0, 0, '^'),
            array(0, 0, 0, 0, '>'),
            array(0, 0, 0, -1, null),
            array(0, 0, 0, -1, '<'),
            array(0, 0, 0, -1, '!'),
            array(0, 0, 0, -1, '^'),
            array(0, 0, 0, -1, '>'),
            array(0, 0, 0, 1, null),
            array(0, 0, 0, 1, '<'),
            array(0, 0, 0, 1, '!'),
            array(0, 0, 0, 1, '^'),
            array(0, 0, 0, 1, '>'),
            array(0, 0, -1, null, null),
            array(0, 0, -1, null, '<'),
            array(0, 0, -1, null, '!'),
            array(0, 0, -1, null, '^'),
            array(0, 0, -1, null, '>'),
            array(0, 0, -1, 0, null),
            array(0, 0, -1, 0, '<'),
            array(0, 0, -1, 0, '!'),
            array(0, 0, -1, 0, '^'),
            array(0, 0, -1, 0, '>'),
            array(0, 0, -1, -1, null),
            array(0, 0, -1, -1, '<'),
            array(0, 0, -1, -1, '!'),
            array(0, 0, -1, -1, '^'),
            array(0, 0, -1, -1, '>'),
            array(0, 0, -1, 1, null),
            array(0, 0, -1, 1, '<'),
            array(0, 0, -1, 1, '!'),
            array(0, 0, -1, 1, '^'),
            array(0, 0, -1, 1, '>'),
            array(0, 0, 1, null, null),
            array(0, 0, 1, null, '<'),
            array(0, 0, 1, null, '!'),
            array(0, 0, 1, null, '^'),
            array(0, 0, 1, null, '>'),
            array(0, 0, 1, 0, null),
            array(0, 0, 1, 0, '<'),
            array(0, 0, 1, 0, '!'),
            array(0, 0, 1, 0, '^'),
            array(0, 0, 1, 0, '>'),
            array(0, 0, 1, -1, null),
            array(0, 0, 1, -1, '<'),
            array(0, 0, 1, -1, '!'),
            array(0, 0, 1, -1, '^'),
            array(0, 0, 1, -1, '>'),
            array(0, 0, 1, 1, null),
            array(0, 0, 1, 1, '<'),
            array(0, 0, 1, 1, '!'),
            array(0, 0, 1, 1, '^'),
            array(0, 0, 1, 1, '>'),
            array(0, 100, null, null, null),
            array(0, 100, null, null, '<'),
            array(0, 100, null, null, '!'),
            array(0, 100, null, null, '^'),
            array(0, 100, null, null, '>'),
            array(0, 100, null, 0, null),
            array(0, 100, null, 0, '<'),
            array(0, 100, null, 0, '!'),
            array(0, 100, null, 0, '^'),
            array(0, 100, null, 0, '>'),
            array(0, 100, null, -1, null),
            array(0, 100, null, -1, '<'),
            array(0, 100, null, -1, '!'),
            array(0, 100, null, -1, '^'),
            array(0, 100, null, -1, '>'),
            array(0, 100, null, 1, null),
            array(0, 100, null, 1, '<'),
            array(0, 100, null, 1, '!'),
            array(0, 100, null, 1, '^'),
            array(0, 100, null, 1, '>'),
            array(0, 100, 0, null, null),
            array(0, 100, 0, null, '<'),
            array(0, 100, 0, null, '!'),
            array(0, 100, 0, null, '^'),
            array(0, 100, 0, null, '>'),
            array(0, 100, 0, 0, null),
            array(0, 100, 0, 0, '<'),
            array(0, 100, 0, 0, '!'),
            array(0, 100, 0, 0, '^'),
            array(0, 100, 0, 0, '>'),
            array(0, 100, 0, -1, null),
            array(0, 100, 0, -1, '<'),
            array(0, 100, 0, -1, '!'),
            array(0, 100, 0, -1, '^'),
            array(0, 100, 0, -1, '>'),
            array(0, 100, 0, 1, null),
            array(0, 100, 0, 1, '<'),
            array(0, 100, 0, 1, '!'),
            array(0, 100, 0, 1, '^'),
            array(0, 100, 0, 1, '>'),
            array(0, 100, -1, null, null),
            array(0, 100, -1, null, '<'),
            array(0, 100, -1, null, '!'),
            array(0, 100, -1, null, '^'),
            array(0, 100, -1, null, '>'),
            array(0, 100, -1, 0, null),
            array(0, 100, -1, 0, '<'),
            array(0, 100, -1, 0, '!'),
            array(0, 100, -1, 0, '^'),
            array(0, 100, -1, 0, '>'),
            array(0, 100, -1, -1, null),
            array(0, 100, -1, -1, '<'),
            array(0, 100, -1, -1, '!'),
            array(0, 100, -1, -1, '^'),
            array(0, 100, -1, -1, '>'),
            array(0, 100, -1, 1, null),
            array(0, 100, -1, 1, '<'),
            array(0, 100, -1, 1, '!'),
            array(0, 100, -1, 1, '^'),
            array(0, 100, -1, 1, '>'),
            array(0, 100, 1, null, null),
            array(0, 100, 1, null, '<'),
            array(0, 100, 1, null, '!'),
            array(0, 100, 1, null, '^'),
            array(0, 100, 1, null, '>'),
            array(0, 100, 1, 0, null),
            array(0, 100, 1, 0, '<'),
            array(0, 100, 1, 0, '!'),
            array(0, 100, 1, 0, '^'),
            array(0, 100, 1, 0, '>'),
            array(0, 100, 1, -1, null),
            array(0, 100, 1, -1, '<'),
            array(0, 100, 1, -1, '!'),
            array(0, 100, 1, -1, '^'),
            array(0, 100, 1, -1, '>'),
            array(0, 100, 1, 1, null),
            array(0, 100, 1, 1, '<'),
            array(0, 100, 1, 1, '!'),
            array(0, 100, 1, 1, '^'),
            array(0, 100, 1, 1, '>'),
            array(100, null, null, null, null),
            array(100, null, null, null, '<'),
            array(100, null, null, null, '!'),
            array(100, null, null, null, '^'),
            array(100, null, null, null, '>'),
            array(100, null, null, 0, null),
            array(100, null, null, 0, '<'),
            array(100, null, null, 0, '!'),
            array(100, null, null, 0, '^'),
            array(100, null, null, 0, '>'),
            array(100, null, null, -1, null),
            array(100, null, null, -1, '<'),
            array(100, null, null, -1, '!'),
            array(100, null, null, -1, '^'),
            array(100, null, null, -1, '>'),
            array(100, null, null, 1, null),
            array(100, null, null, 1, '<'),
            array(100, null, null, 1, '!'),
            array(100, null, null, 1, '^'),
            array(100, null, null, 1, '>'),
            array(100, null, 0, null, null),
            array(100, null, 0, null, '<'),
            array(100, null, 0, null, '!'),
            array(100, null, 0, null, '^'),
            array(100, null, 0, null, '>'),
            array(100, null, 0, 0, null),
            array(100, null, 0, 0, '<'),
            array(100, null, 0, 0, '!'),
            array(100, null, 0, 0, '^'),
            array(100, null, 0, 0, '>'),
            array(100, null, 0, -1, null),
            array(100, null, 0, -1, '<'),
            array(100, null, 0, -1, '!'),
            array(100, null, 0, -1, '^'),
            array(100, null, 0, -1, '>'),
            array(100, null, 0, 1, null),
            array(100, null, 0, 1, '<'),
            array(100, null, 0, 1, '!'),
            array(100, null, 0, 1, '^'),
            array(100, null, 0, 1, '>'),
            array(100, null, -1, null, null),
            array(100, null, -1, null, '<'),
            array(100, null, -1, null, '!'),
            array(100, null, -1, null, '^'),
            array(100, null, -1, null, '>'),
            array(100, null, -1, 0, null),
            array(100, null, -1, 0, '<'),
            array(100, null, -1, 0, '!'),
            array(100, null, -1, 0, '^'),
            array(100, null, -1, 0, '>'),
            array(100, null, -1, -1, null),
            array(100, null, -1, -1, '<'),
            array(100, null, -1, -1, '!'),
            array(100, null, -1, -1, '^'),
            array(100, null, -1, -1, '>'),
            array(100, null, -1, 1, null),
            array(100, null, -1, 1, '<'),
            array(100, null, -1, 1, '!'),
            array(100, null, -1, 1, '^'),
            array(100, null, -1, 1, '>'),
            array(100, null, 1, null, null),
            array(100, null, 1, null, '<'),
            array(100, null, 1, null, '!'),
            array(100, null, 1, null, '^'),
            array(100, null, 1, null, '>'),
            array(100, null, 1, 0, null),
            array(100, null, 1, 0, '<'),
            array(100, null, 1, 0, '!'),
            array(100, null, 1, 0, '^'),
            array(100, null, 1, 0, '>'),
            array(100, null, 1, -1, null),
            array(100, null, 1, -1, '<'),
            array(100, null, 1, -1, '!'),
            array(100, null, 1, -1, '^'),
            array(100, null, 1, -1, '>'),
            array(100, null, 1, 1, null),
            array(100, null, 1, 1, '<'),
            array(100, null, 1, 1, '!'),
            array(100, null, 1, 1, '^'),
            array(100, null, 1, 1, '>'),
            array(100, 0, null, null, null),
            array(100, 0, null, null, '<'),
            array(100, 0, null, null, '!'),
            array(100, 0, null, null, '^'),
            array(100, 0, null, null, '>'),
            array(100, 0, null, 0, null),
            array(100, 0, null, 0, '<'),
            array(100, 0, null, 0, '!'),
            array(100, 0, null, 0, '^'),
            array(100, 0, null, 0, '>'),
            array(100, 0, null, -1, null),
            array(100, 0, null, -1, '<'),
            array(100, 0, null, -1, '!'),
            array(100, 0, null, -1, '^'),
            array(100, 0, null, -1, '>'),
            array(100, 0, null, 1, null),
            array(100, 0, null, 1, '<'),
            array(100, 0, null, 1, '!'),
            array(100, 0, null, 1, '^'),
            array(100, 0, null, 1, '>'),
            array(100, 0, 0, null, null),
            array(100, 0, 0, null, '<'),
            array(100, 0, 0, null, '!'),
            array(100, 0, 0, null, '^'),
            array(100, 0, 0, null, '>'),
            array(100, 0, 0, 0, null),
            array(100, 0, 0, 0, '<'),
            array(100, 0, 0, 0, '!'),
            array(100, 0, 0, 0, '^'),
            array(100, 0, 0, 0, '>'),
            array(100, 0, 0, -1, null),
            array(100, 0, 0, -1, '<'),
            array(100, 0, 0, -1, '!'),
            array(100, 0, 0, -1, '^'),
            array(100, 0, 0, -1, '>'),
            array(100, 0, 0, 1, null),
            array(100, 0, 0, 1, '<'),
            array(100, 0, 0, 1, '!'),
            array(100, 0, 0, 1, '^'),
            array(100, 0, 0, 1, '>'),
            array(100, 0, -1, null, null),
            array(100, 0, -1, null, '<'),
            array(100, 0, -1, null, '!'),
            array(100, 0, -1, null, '^'),
            array(100, 0, -1, null, '>'),
            array(100, 0, -1, 0, null),
            array(100, 0, -1, 0, '<'),
            array(100, 0, -1, 0, '!'),
            array(100, 0, -1, 0, '^'),
            array(100, 0, -1, 0, '>'),
            array(100, 0, -1, -1, null),
            array(100, 0, -1, -1, '<'),
            array(100, 0, -1, -1, '!'),
            array(100, 0, -1, -1, '^'),
            array(100, 0, -1, -1, '>'),
            array(100, 0, -1, 1, null),
            array(100, 0, -1, 1, '<'),
            array(100, 0, -1, 1, '!'),
            array(100, 0, -1, 1, '^'),
            array(100, 0, -1, 1, '>'),
            array(100, 0, 1, null, null),
            array(100, 0, 1, null, '<'),
            array(100, 0, 1, null, '!'),
            array(100, 0, 1, null, '^'),
            array(100, 0, 1, null, '>'),
            array(100, 0, 1, 0, null),
            array(100, 0, 1, 0, '<'),
            array(100, 0, 1, 0, '!'),
            array(100, 0, 1, 0, '^'),
            array(100, 0, 1, 0, '>'),
            array(100, 0, 1, -1, null),
            array(100, 0, 1, -1, '<'),
            array(100, 0, 1, -1, '!'),
            array(100, 0, 1, -1, '^'),
            array(100, 0, 1, -1, '>'),
            array(100, 0, 1, 1, null),
            array(100, 0, 1, 1, '<'),
            array(100, 0, 1, 1, '!'),
            array(100, 0, 1, 1, '^'),
            array(100, 0, 1, 1, '>'),
            array(100, 100, null, null, null),
            array(100, 100, null, null, '<'),
            array(100, 100, null, null, '!'),
            array(100, 100, null, null, '^'),
            array(100, 100, null, null, '>'),
            array(100, 100, null, 0, null),
            array(100, 100, null, 0, '<'),
            array(100, 100, null, 0, '!'),
            array(100, 100, null, 0, '^'),
            array(100, 100, null, 0, '>'),
            array(100, 100, null, -1, null),
            array(100, 100, null, -1, '<'),
            array(100, 100, null, -1, '!'),
            array(100, 100, null, -1, '^'),
            array(100, 100, null, -1, '>'),
            array(100, 100, null, 1, null),
            array(100, 100, null, 1, '<'),
            array(100, 100, null, 1, '!'),
            array(100, 100, null, 1, '^'),
            array(100, 100, null, 1, '>'),
            array(100, 100, 0, null, null),
            array(100, 100, 0, null, '<'),
            array(100, 100, 0, null, '!'),
            array(100, 100, 0, null, '^'),
            array(100, 100, 0, null, '>'),
            array(100, 100, 0, 0, null),
            array(100, 100, 0, 0, '<'),
            array(100, 100, 0, 0, '!'),
            array(100, 100, 0, 0, '^'),
            array(100, 100, 0, 0, '>'),
            array(100, 100, 0, -1, null),
            array(100, 100, 0, -1, '<'),
            array(100, 100, 0, -1, '!'),
            array(100, 100, 0, -1, '^'),
            array(100, 100, 0, -1, '>'),
            array(100, 100, 0, 1, null),
            array(100, 100, 0, 1, '<'),
            array(100, 100, 0, 1, '!'),
            array(100, 100, 0, 1, '^'),
            array(100, 100, 0, 1, '>'),
            array(100, 100, -1, null, null),
            array(100, 100, -1, null, '<'),
            array(100, 100, -1, null, '!'),
            array(100, 100, -1, null, '^'),
            array(100, 100, -1, null, '>'),
            array(100, 100, -1, 0, null),
            array(100, 100, -1, 0, '<'),
            array(100, 100, -1, 0, '!'),
            array(100, 100, -1, 0, '^'),
            array(100, 100, -1, 0, '>'),
            array(100, 100, -1, -1, null),
            array(100, 100, -1, -1, '<'),
            array(100, 100, -1, -1, '!'),
            array(100, 100, -1, -1, '^'),
            array(100, 100, -1, -1, '>'),
            array(100, 100, -1, 1, null),
            array(100, 100, -1, 1, '<'),
            array(100, 100, -1, 1, '!'),
            array(100, 100, -1, 1, '^'),
            array(100, 100, -1, 1, '>'),
            array(100, 100, 1, null, null),
            array(100, 100, 1, null, '<'),
            array(100, 100, 1, null, '!'),
            array(100, 100, 1, null, '^'),
            array(100, 100, 1, null, '>'),
            array(100, 100, 1, 0, null),
            array(100, 100, 1, 0, '<'),
            array(100, 100, 1, 0, '!'),
            array(100, 100, 1, 0, '^'),
            array(100, 100, 1, 0, '>'),
            array(100, 100, 1, -1, null),
            array(100, 100, 1, -1, '<'),
            array(100, 100, 1, -1, '!'),
            array(100, 100, 1, -1, '^'),
            array(100, 100, 1, -1, '>'),
            array(100, 100, 1, 1, null),
            array(100, 100, 1, 1, '<'),
            array(100, 100, 1, 1, '!'),
            array(100, 100, 1, 1, '^'),
            array(100, 100, 1, 1, '>'),);
    }

    public function provideWrongGeometries()
    {
        return array(
        );
    }
}
