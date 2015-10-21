<?php
/**
 * Easylife_Tag extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE_EASYLIFE_TAG.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category       Easylife
 * @package        Easylife_Tag
 * @copyright      2014 Marius Strajeru, Mateusz Barucha
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Module helper
 *
 * @category    Easylife
 * @package	    Easylife_Tag
 */
class Easylife_Tag_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * return URL in a correct form
     * @return string
     */
    public function normalizeURL($url)
    {
      $url = transliterator_transliterate('Any-Latin; Latin-ASCII', $url);
      $url = strtolower($url);
      return str_replace(' ', '-', $url);
    }

}
