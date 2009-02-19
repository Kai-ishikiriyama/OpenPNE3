<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

class insertLoginGadget extends opMigration
{
  public function up()
  {
    $gadget = new Gadget();
    $gadget->setType('loginTop');
    $gadget->setName('loginForm');
    $gadget->setSortOrder(10);
    $gadget->save();
  }
}
