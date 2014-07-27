<?php
/**
 * Sample_News extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category       Sample
 * @package        Sample_News
 * @copyright      Copyright (c) 2014
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
namespace Sample\News\Controller\Adminhtml\Catalog;

class Product extends \Magento\Catalog\Controller\Adminhtml\Product {
    /**
     * articles action
     * @access public
     */
    public function articlesAction(){
        $productId = (int) $this->getRequest()->getParam('id');
        $product = $this->productBuilder->build($this->getRequest());
        $this->_view->loadLayout();
        $this->_view->getLayout()->getBlock('product.edit.tab.article')
            ->setProductArticles($this->getRequest()->getPost('product_articles', null));
        $this->_view->renderLayout();
    }

    /**
     * article grid action
     * @access public
     */
    public function articlesGridAction(){
        $productId = (int) $this->getRequest()->getParam('id');
        $product = $this->productBuilder->build($this->getRequest());
        $this->_view->loadLayout();
        $this->_view->getLayout()->getBlock('product.edit.tab.article')
           ->setProductArticles($this->getRequest()->getPost('product_articles', null));
        $this->_view->renderLayout();
    }
}
