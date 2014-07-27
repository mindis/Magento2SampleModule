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
namespace Sample\News\Helper;
class Category
    extends \Magento\Framework\App\Helper\AbstractHelper {
    /**
     * @var null|\Sample\News\Model\ArticleFactory
     */
    protected $_articleFactory = null;

    /**
     * @access public
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Sample\News\Model\ArticleFactory $articleFactory
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Sample\News\Model\ArticleFactory $articleFactory
    ) {
        $this->_articleFactory = $articleFactory;
        parent::__construct($context);
    }

    /**
     * @access public
     * @param \Magento\Catalog\Model\Category $category
     * @return mixed
     */
    public function getSelectedArticles(\Magento\Catalog\Model\Category $category){
        if (!$category->hasSelectedArticles()) {
            $articles = [];
            foreach ($this->getSelectedArticlesCollection($category) as $article) {
                $articles[] = $article;
            }
            $category->setSelectedArticles($articles);
        }
        return $category->getData('selected_articles');
    }

    /**
     * @access public
     * @param \Magento\Catalog\Model\Category $category
     * @return mixed
     */
    public function getSelectedArticlesCollection(\Magento\Catalog\Model\Category $category){
        $collection = $this->_articleFactory->create()->getResourceCollection()
            ->addCategoryFilter($category);
        return $collection;
    }
}
