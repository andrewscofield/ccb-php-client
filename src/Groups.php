<?php namespace CompassHB\Ccb;

use CompassHB\Ccb\Ccb;

class Groups
{

    public function group($group_id)
    {
        $group = Ccb::$api->get('group_profile_from_id', [
        "id" => intval($group_id)
        ]);
        
        return $group->responseXML()->response->groups->group;
    }

    public function groups($page = 1, $per_page = 100, $modified = null)
    {
        $groups = Ccb::$api->get('group_profiles', [
        "include_participants" => false,
        "include_image_link" => true,
        "page" => $page,
        "per_page" => $per_page,
        "modified_since" => $modified
        ]);

        return $groups->responseXML()->response->groups->group;
    }

    public function groups_with_participants()
    {
        $groups = Ccb::$api->get('group_profiles', [
            "include_participants" => true,
            "incude_image_link" => true
        ]);
            
        return $groups->responseXML()->response->groups;

    }

    public function group_search($args = [])
    {
        $groups = Ccb::$api->get('group_search', $args);
            
        return $groups->responseXML()->response->groups;
    }

    public function group_pulldown($num = '1')
    {
        $groups = Ccb::lookupList('group_grouping');

        return $groups->response->items;
    }
}
