<?php

namespace App\Service;

use GuzzleHttp\Client;
//use Illuminate\Support\Facades\Http;
//use Openpp\NotificationHubsRest\Notification\NotificationFactory;
//use Openpp\NotificationHubsRest\NotificationHub\NotificationHub;
//use WindowsAzure\Common\ServicesBuilder;
//use WindowsAzure\ServiceBus\Models\BrokeredMessage;
//use WindowsAzure\ServiceBus\ServiceBusRestProxy;

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;



class AzureBusService
{
    public static function bus($simulation)
    {
        $connectionString = env('EVENTHUB_CONNECTION_STRING');
        $serviceBusRestProxy = ServicesBuilder::getInstance()->createServiceBusService($connectionString);
        $message = new BrokeredMessage();
        $message->setBody($simulation);
        $serviceBusRestProxy->sendQueueMessage(env('EVENTHUB_QUEUE'), $message);
    }
}
