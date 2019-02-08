<?php namespace CompassHB\Ccb;

use CompassHB\Ccb\Ccb;

class Needs
{

    public function group_needs($group_id)
    {
        $needs = Ccb::$api->get('group_needs', [
        "id" => intval($group_id)
        ]); // TODO(andrew): Some of these returns can be quite large, a caching system would be ideal
        
        return $needs->responseXML()->groups->group->needs;
    }

    public function group_needs_past($group_id)
    {
        $all_needs = $this->group_needs($group_id);

        $past_needs = array();
        foreach($all_needs->need as $need){
            $need_count = intval($need->past_items->attributes()["count"]);
            if($need_count > 0){
                $past_needs = $need;
            }
        }

        return $past_needs;
    }

    public function group_needs_current($group_id)
    {
        $all_needs = $this->group_needs($group_id);

        $current_needs = array();
        foreach($all_needs->need as $need){
            $need_count = intval($need->current_items->attributes()["count"]);
            if($need_count > 0){
                $current_needs[] = $need;
            }
        }

        return $current_needs;
    }


}
