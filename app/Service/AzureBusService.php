<?php

namespace App\Service;
use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;

class AzureBusService
{
    public static function bus(string $simulation)
    {
//        $serviceBusRestProxy = ServicesBuilder::getInstance()
//            ->createServiceBusService('Endpoint=sb://eventhack.servicebus.windows.net/;SharedAccessKeyName=hack;SharedAccessKey=HeHeVaVqyVkntO2FnjQcs2Ilh/4MUDo4y+AEhKp8z+g=;EntityPath=simulacoes');
//
//        try    {
//            // Create message.
//            $message = new BrokeredMessage();
//            $message->setBody($simulation);
//
//            // Send message.
//            $serviceBusRestProxy->sendQueueMessage("simulacao", $message);
//        }
//        catch(ServiceException $e){
//            // Handle exception based on error codes and messages.
//            // Error codes and messages are here:
//            // https://learn.microsoft.com/rest/api/storageservices/Common-REST-API-Error-Codes
//            $code = $e->getCode();
//            $error_message = $e->getMessage();
//            echo $code.": ".$error_message."<br />";
//        }

    }
}
