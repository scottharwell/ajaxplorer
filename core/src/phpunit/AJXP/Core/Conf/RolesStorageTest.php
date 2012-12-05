<?php
/*
 * Copyright 2007-2011 Charles du Jeu <contact (at) cdujeu.me>
 * This file is part of AjaXplorer.
 *
 * AjaXplorer is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * AjaXplorer is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with AjaXplorer.  If not, see <http://www.gnu.org/licenses/>.
 *
 * The latest code can be found at <http://www.ajaxplorer.info/>.
 */

class AJXP_Core_Conf_RolesStorageTest extends PHPUnit_Framework_TestCase
{

    public function testRolesStorage(){

        $r = new AJXP_Role("phpunit_temporary_role");
        $r->setAcl(0, "rw");
        AuthService::updateRole($r);
        $r1 = AuthService::getRole("phpunit_temporary_role");
        $this->assertTrue(is_a($r1, "AJXP_Role"));
        $this->assertEquals("rw", $r1->getAcl(0));
        AuthService::deleteRole("phpunit_temporary_role");
        $r2 = AuthService::getRole("phpunit_temporary_role");
        $this->assertFalse($r2);
    }

}
