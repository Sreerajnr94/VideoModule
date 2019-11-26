<?php
namespace Terrificminds\ProductVideos\Block;
use Magento\Framework\UrlFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;

class Productvideos extends \Magento\Catalog\Block\Product\View
{
	
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Framework\Url\EncoderInterface $urlEncoder,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder,
        \Magento\Framework\Stdlib\StringUtils $string,
        \Magento\Catalog\Helper\Product $productHelper,
        \Magento\Catalog\Model\ProductTypes\ConfigInterface $productTypeConfig,
        \Magento\Framework\Locale\FormatInterface $localeFormat,
        \Magento\Customer\Model\Session $customerSession,
        ProductRepositoryInterface $productRepository,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        array $data = [],
        \Terrificminds\ProductVideos\Model\ResourceModel\Productvideos\CollectionFactory $videoCollectionFactory
    ) {
        parent::__construct(
            $context,
            $urlEncoder,
            $jsonEncoder,
            $string,
            $productHelper,
            $productTypeConfig,
            $localeFormat,
            $customerSession,
            $productRepository,
            $priceCurrency,
            $data
        );
        $this->videoCollectionFactory = $videoCollectionFactory;
    }
	public function getProductVideoCollections($id){
		$videoCollection = $this->videoCollectionFactory->create()->addFieldToFilter("product_id",$id);
		return $videoCollection;


	}
	
}
