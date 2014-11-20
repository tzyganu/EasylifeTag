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
class Easylife_Tag_Model_Resource_Tag extends Mage_Tag_Model_Resource_Tag
{
    /**
     * by default loadByName does not load the store ids in which the tag is allowed
     * this should overcome the limitation.
     * @param Mage_Tag_Model_Tag $model
     * @param string $name
     * @return array|bool|false
     */
    public function loadByName($model, $name)
    {
        parent::loadByName($model, $name);
        if ($model->getId()) {
            $this->_afterLoad($model);
        } else {
            return false;
        }
    }
}
