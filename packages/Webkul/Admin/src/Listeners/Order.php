<?php

namespace Webkul\Admin\Listeners;

use Illuminate\Support\Facades\Mail;
use Webkul\Admin\Mail\NewAdminNotification;
use Webkul\Admin\Mail\NewOrderNotification;
use Webkul\Admin\Mail\NewRefundNotification;
use Webkul\Admin\Mail\NewInvoiceNotification;
use Webkul\Admin\Mail\CancelOrderNotification;
use Webkul\Admin\Mail\NewShipmentNotification;
use Webkul\Admin\Mail\OrderCommentNotification;
use Webkul\Admin\Mail\CancelOrderAdminNotification;
use Webkul\Admin\Mail\NewInventorySourceNotification;
use Illuminate\Support\Facades\Log;

class Order
{
    /**
     * Send new order Mail to the customer and admin
     *
     * @param  \Webkul\Sales\Contracts\Order  $order
     * @return void
     */
    public function sendNewOrderMail($order)
    {
        $customerLocale = $this->getLocale($order);

        try {
            /* email to customer */
            $configKey = 'emails.general.notifications.emails.general.notifications.new-order';
            if (core()->getConfigData($configKey)) {
                $this->prepareMail($customerLocale, new NewOrderNotification($order));
            }

            /* email to admin */
            $configKey = 'emails.general.notifications.emails.general.notifications.new-admin';
            if (core()->getConfigData($configKey)) {
                $this->prepareMail('en', new NewAdminNotification($order));
            }
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * Send new invoice mail to the customer
     *
     * @param  \Webkul\Sales\Contracts\Invoice  $invoice
     * @return void
     */
    public function sendNewInvoiceMail($invoice)
    {
        $customerLocale = $this->getLocale($invoice);

        try {
            if ($invoice->email_sent) {
                return;
            }

            /* email to customer */
            $configKey = 'emails.general.notifications.emails.general.notifications.new-invoice';
            if (core()->getConfigData($configKey)) {
                $this->prepareMail($customerLocale, new NewInvoiceNotification($invoice));
            }
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * Send new refund mail to the customer
     *
     * @param  \Webkul\Sales\Contracts\Refund  $refund
     * @return void
     */
    public function sendNewRefundMail($refund)
    {
        $customerLocale = $this->getLocale($refund);

        try {
            /* email to customer */
            $configKey = 'emails.general.notifications.emails.general.notifications.new-refund';
            if (core()->getConfigData($configKey)) {
                $this->prepareMail($customerLocale, new NewRefundNotification($refund));
            }
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * Send new shipment mail to the customer
     *
     * @param  \Webkul\Sales\Contracts\Shipment  $shipment
     * @return void
     */
    public function sendNewShipmentMail($shipment)
    {
        $customerLocale = $this->getLocale($shipment);
  
        try {
            if ($shipment->email_sent) {
                return;
            }
           
            /* email to customer */
            $configKey = 'emails.general.notifications.emails.general.notifications.new-shipment';
             
            if (core()->getConfigData($configKey)) {
               Log::info("Line 111 shipment: ",[$shipment->order]); 
                $this->prepareMail($customerLocale, new NewShipmentNotification($shipment));
                Log::info('NewShipmentNotification after 113');
            }
            
            /* email to admin */
            $configKey = 'emails.general.notifications.emails.general.notifications.new-inventory-source';
            if (core()->getConfigData($configKey)) {
                Log::info('NewShipmentNotification admin before 119 $shipment->order->shipping_address',[$shipment->order->shipping_address]);
                $this->prepareMail(env('APP_LOCALE'), new NewInventorySourceNotification($shipment));
                Log::info('NewShipmentNotification admin after 121');
            }
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * @param  \Webkul\Sales\Contracts\Order  $order
     * @return void
     */
    public function sendCancelOrderMail($order)
    {
        $customerLocale = $this->getLocale($order);

        try {
            /* email to customer */
            $configKey = 'emails.general.notifications.emails.general.notifications.cancel-order';
            if (core()->getConfigData($configKey)) {
                $this->prepareMail($customerLocale, new CancelOrderNotification($order));
            }

            /* email to admin */
            $configKey = 'emails.general.notifications.emails.general.notifications.new-admin';
            if (core()->getConfigData($configKey)) {
                $this->prepareMail(env('APP_LOCALE'), new CancelOrderAdminNotification($order));
            }
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * @param  \Webkul\Sales\Contracts\OrderComment  $comment
     * @return void
     */
    public function sendOrderCommentMail($comment)
    {
        $customerLocale = $this->getLocale($comment);

        if (! $comment->customer_notified) {
            return;
        }

        try {
            /* email to customer */
            $this->prepareMail($customerLocale, new OrderCommentNotification($comment));
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * Get the locale of the customer if somehow item name changes then the english locale will pe provided.
     *
     * @param object \Webkul\Sales\Contracts\Order|\Webkul\Sales\Contracts\Invoice|\Webkul\Sales\Contracts\Refund|\Webkul\Sales\Contracts\Shipment|\Webkul\Sales\Contracts\OrderComment
     * @return string
     */
    private function getLocale($object)
    {
        if ($object instanceof \Webkul\Sales\Contracts\OrderComment) {
            $object = $object->order;
        }

        $objectFirstItem = $object->items->first();
        return isset($objectFirstItem->additional['locale']) ? $objectFirstItem->additional['locale'] : 'en';
    }

    /**
     * Prepare Mail.
     * @return void
     */
    private function prepareMail($locale, $notification)
    {
        app()->setLocale($locale);
        Mail::queue($notification);
    }
}