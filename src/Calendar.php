<?php namespace CompassHB\Ccb;

use CompassHB\Ccb\Ccb;

class Calendar{

    /**
     * @param DateTime $date_start
     * @param DateTime $date_end
     *
     * @return ...
     */
    public function publicCalendarListing($date_start="2010-01-01", $date_end=NULL){

      $args["date_start"] = Ccb::format_date($date_start);;

      if(!empty($date_end)){
        $args["date_end"] = Ccb::format_date($date_end);;
      }

      $calendar_listing = Ccb::$api->get("public_calendar_listing", $args);
      return $calendar_listing->responseXML()->response->items->item;
    }

}
