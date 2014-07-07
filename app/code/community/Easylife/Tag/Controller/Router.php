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
 * @copyright      Copyright (c) 2014
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
class Easylife_Tag_Controller_Router extends Mage_Core_Controller_Varien_Router_Abstract{
    /**
     * add router to all routers
     * @param $observer
     * @return $this
     */
    public function initControllerRouters($observer){
        $front = $observer->getEvent()->getFront();
        $front->addRouter('easylife_tag', $this);
        return $this;
    }

    /**
     * match the route
     * @param Zend_Controller_Request_Http $request
     * @return bool
     */
    public function match(Zend_Controller_Request_Http $request){
        //if magento is not installed redirect to install
        if (!Mage::isInstalled()) {
            Mage::app()->getFrontController()->getResponse()
                ->setRedirect(Mage::getUrl('install'))
                ->sendResponse();
            exit;
        }
        //get the url key
        $urlKey = trim($request->getPathInfo(), '/');
        //explode by slash
        $parts = explode('/', $urlKey);
        //if there are not 2 parts (tag/something) in the url we don't care about it.
        //return false and let the rest of the application take care of the url.
        if (count($parts) != 2) {
            return false;
        }
        //if the first part of the url key is not 'tag' we don't care about it
        //return false and let the rest of the application take care of the url
        if ($parts[0] != 'tag') {
            return false;
        }
        $tagName = $parts[1]; //tag name
        //load the tag model
        $tag = Mage::getModel('tag/tag')->loadByName($tagName);
        //if there is no tag with this name available in the current store just do nothing
        if(!$tag->getId() || !$tag->isAvailableInStore()) {
            return false;
        }
        //but if the tag is valid
        //say to magento that the request should be mapped to `tag/product/list/tagId/ID_HERE` - the original url
        $request->setModuleName('tag')
            ->setControllerName('product')
            ->setActionName('list')
            ->setParam('tagId', $tag->getId());
        $request->setAlias(
            Mage_Core_Model_Url_Rewrite::REWRITE_REQUEST_PATH_ALIAS,
            $urlKey
        );
        return true;
    }
}
