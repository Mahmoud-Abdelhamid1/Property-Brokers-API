<?php

namespace App\Enums;

enum ListingTypeEnums : string {
    case OPEN = 'Open Listing';
    case SELL = 'Sell Listing';
    case EXECLUSIVE = 'Execlusive Listing';
    case NET = 'Net Listing';
}

?>
