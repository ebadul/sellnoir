<?php

namespace Webkul\SAASCustomizer\Helpers;

use Illuminate\Support\Facades\DB;
use Webkul\Product\Helpers\Review;
use Webkul\Product\Models\Product as ProductModel;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Repositories\ProductFlatRepository;
use Webkul\Velocity\Repositories\OrderBrandsRepository;
use Webkul\Attribute\Repositories\AttributeOptionRepository;
use Webkul\Product\Repositories\ProductReviewRepository;
use Webkul\Velocity\Repositories\VelocityMetadataRepository;

use Company;

class Helper extends Review
{
    /**
     * productModel object
     *
     * @var \Webkul\Product\Contracts\Product
     */
   protected $productModel;

    /**
     * orderBrands object
     *
     * @var \Webkul\Velocity\Repositories\OrderBrandsRepository
     */
    protected $orderBrandsRepository;

    /**
     * ProductRepository object
     *
     * @var \Webkul\Product\Repositories\ProductRepository
     */
    protected $productRepository;

    /**
     * ProductFlatRepository object
     *
     * @var \Webkul\Product\Repositories\ProductFlatRepository
     */
    protected $productFlatRepository;

    /**
     * productModel object
     *
     * @var \Webkul\Attribute\Repositories\AttributeOptionRepository
     */
    protected $attributeOptionRepository;

    /**
     * ProductReviewRepository object
     *
     * @var \Webkul\Product\Repositories\ProductReviewRepository
     */
    protected $productReviewRepository;

    /**
     * VelocityMetadata object
     *
     * @var \Webkul\Velocity\Repositories\VelocityMetadataRepository
     */
    protected $velocityMetadataRepository;

    /**
     * Create a helper instamce
     *
     * @param  \Webkul\Product\Contracts\Product                        $productModel
     * @param  \Webkul\Velocity\Repositories\OrderBrandsRepository      $orderBrands
     * @param  \Webkul\Attribute\Repositories\AttributeOptionRepository $attributeOptionRepository
     * @param  \Webkul\Product\Repositories\ProductReviewRepository     $productReviewRepository
     * @param  \Webkul\Velocity\Repositories\VelocityMetadataRepository $velocityMetadataRepository
     *
     * @return void
     */
    public function __construct(
        ProductModel $productModel,
        ProductRepository $productRepository,
        AttributeOptionRepository $attributeOptionRepository,
        ProductFlatRepository $productFlatRepository,
        OrderBrandsRepository $orderBrandsRepository,
        ProductReviewRepository $productReviewRepository,
        VelocityMetadataRepository $velocityMetadataRepository
    ) {
        $this->productModel =  $productModel;

        $this->attributeOptionRepository =  $attributeOptionRepository;

        $this->productRepository = $productRepository;

        $this->productFlatRepository = $productFlatRepository;

        $this->orderBrandsRepository = $orderBrandsRepository;

        $this->productReviewRepository =  $productReviewRepository;

        $this->velocityMetadataRepository =  $velocityMetadataRepository;
    }

    /**
     * Returns the count rating of the product
     *
     * @return array
     */
    public function getVelocityMetaData($locale = null, $channel = null, $default = true)
    {
        $company = Company::getCurrent();

        if ( isset($company->id)) {
            if (! $locale) {
                $locale = request()->get('locale') ?: app()->getLocale();
            }
    
            if (! $channel) {
                $channel = request()->get('channel') ?: (isset($company->username) ? $company->username : core()->getCurrentChannelCode());
            }
    
            try {
                $metaData = $this->velocityMetadataRepository->findOneWhere([
                    'company_id'    => $company->id,
                    'locale'        => $locale,
                    'channel'       => $channel
                ]);
    
                if (! $metaData && $default) {
                    $metaData = $this->velocityMetadataRepository->findOneWhere([
                        'company_id'    => $company->id,
                        'locale'        => app()->getLocale(),
                        'channel'       => (isset($company->username) ? $company->username : core()->getCurrentChannelCode())
                    ]);
                }
    
                return $metaData;
            } catch (\Exception $exception) {
            }
        }
    }
}