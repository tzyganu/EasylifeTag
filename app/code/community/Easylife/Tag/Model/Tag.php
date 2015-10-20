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
 * @copyright      2014 Marius Strajeru
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
class Easylife_Tag_Model_Tag extends Mage_Tag_Model_Tag
{
    /**
     * change the tag url from `tag/product/list/tagId/ID-HERE` to `tag/TAG-NAME_HERE`
     * @access public
     * @return string
     */
    public function getTaggedProductsUrl()
    {
        $name = $this->getName();
        $name = transliterator_transliterate('Any-Latin; Latin-ASCII', $name);
        $name = strtolower($name);
        $name = str_replace(' ', '-', $name);
        return Mage::getUrl('', array('_direct' => 'tag/'.$name));
    }
}
