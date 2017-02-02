<?php namespace CompassHB\Ccb;

use CompassHB\Ccb\Ccb;

class Positions
{

    public function all_positions()
    {
        return Ccb::$api->get('position_list');
    }

    public function groupPositions($group_id)
    {
        return Ccb::$api->get('group_positions', [
        'group_positions' => $id,
        ]);
    }
}
