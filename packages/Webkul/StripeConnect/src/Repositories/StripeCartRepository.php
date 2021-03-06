<?php

namespace Webkul\StripeConnect\Repositories;

use Webkul\Core\Eloquent\Repository;

/**
 * Stripe Cart Reposotory
 *
 * @author  Prashant Singh <prashant.singh@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class StripeCartRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\StripeConnect\Contracts\StripeCart';
    }
}