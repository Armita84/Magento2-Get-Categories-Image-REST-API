<?php
namespace CustomApi\CategoryImagesUrl\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory as CategoryCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Store\Model\Store;

class CategoryImagesUrl implements \CustomApi\CategoryImagesUrl\Api\CategoryImagesUrlInterface
{
    /**
     * @var CategoryCollectionFactory
     */
    protected $_categoryCollectionFactory;

    /**
     * @var StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @param CategoryCollectionFactory $categoryCollectionFactory
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        CategoryCollectionFactory $categoryCollectionFactory,
        StoreManagerInterface $storeManager
    ) {
        $this->_categoryCollectionFactory = $categoryCollectionFactory;
        $this->_storeManager = $storeManager;
    }

    /**
     * Retrieve category images.
     *
     * @api
     * @return array Category images.
     */
       public function getCategoryImages()
    {
        $categoryCollection = $this->_categoryCollectionFactory->create();
        $categoryCollection->addAttributeToSelect('*');
        $categoryCollection->setStoreId(Store::DEFAULT_STORE_ID);
        $categoryData = [];
        foreach ($categoryCollection as $category) {
            $imagePath = $category->getImageUrl();
            if ($imagePath) {
                $baseUrl = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_WEB);
                $categoryData[] = [
                    'id' => $category->getId(),
                    'name' => $category->getName(),
                    'image_url' => $baseUrl . $imagePath
                ];
            }
        }
        return $categoryData;
    }
}
