<?php namespace CompassHB\Ccb;

use CompassHB\Ccb\Ccb;

class Process{

    /**
     * @param int    $id
     *
     * @return ...
     */
    public function queueIndividuals($id, $status='not-started'){
        $queue_individuals = Ccb::$api->get('queue_individuals', [
            'id' => $id,
            'status' => $status
        ]);

        return $queue_individuals->responseXML()->response->individuals->individual;
    }


    

}
