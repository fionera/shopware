<?php
/**
 * Shopware 5
 * Copyright (c) shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

use Shopware\Components\Random;

/**
 * @category  Shopware
 *
 * @copyright Copyright (c) shopware AG (http://www.shopware.de)
 */
class Shopware_Tests_Components_RandomTest extends Enlight_Components_Test_TestCase
{
    /**
     * Test case
     */
    public function testGeneratePassword()
    {
        $sets = [];
        $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        $sets[] = '23456789';
        $sets[] = '!@#$%&*?';

        $chars = implode($sets);

        $password = Random::generatePassword();
        $this->assertEquals(15, strlen($password));

        for ($i = 0; $i < strlen($password); ++$i) {
            $char = $password[$i];

            $this->assertContains($char, $chars);

            foreach ($sets as $key => $set) {
                if (strpos($set, $char) !== false) {
                    unset($sets[$key]);
                }
            }
        }

        $this->assertEmpty($sets);
    }

    /**
     * Test case
     */
    public function testGetBoolean()
    {
        $result = Random::getBoolean();
        $this->assertInternalType('boolean', $result);
    }

    /**
     * Test case
     */
    public function testGetInteger()
    {
        $result = Random::getInteger(-100, 100);
        $this->assertLessThanOrEqual(100, $result);
        $this->assertGreaterThanOrEqual(-100, $result);
    }

    /**
     * Test case
     */
    public function testGetFloat()
    {
        $result = Random::getFloat();
        $this->assertInternalType('float', $result);
        $this->assertLessThanOrEqual(1, $result);
        $this->assertGreaterThanOrEqual(0, $result);
    }
}