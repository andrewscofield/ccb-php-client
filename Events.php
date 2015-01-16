<?php
namespace CompassHB\Ccb;

class Events {
    
    /** @type Client */
    private $client;
    
    /**
     * @param Client $client
     */
    public function __construct(Client $client) {
        $this->client = $client;
    }
    
    
    /**
     * @param int    $id
     * @param int    $event_id
     * @param string $status Must be one of the following: ‘add’; ‘invite’; ‘decline’; ‘maybe’; ‘request’
     * 
     * @return ...
     */
    public function addIndividualToEvent($id, $event_id, $status) {
        return $this->client->srv('add_individual_to_event', [
            'id' => $id,
            'event_id' => $event_id,
            'status' => $status,
        ], 'POST');
    }
    
    /**
     * @param int      $id
     * @param DateTime $occurrence
     * 
     * @return ...
     */
    public function attendanceProfile($id, DateTime $occurrence) {
        return $this->client->srv('attendance_profile', [
            'id' => $id,
            'occurrence' => $occurrence, // TODO(evan): Convert to correctly-formatted string
        ]);
    }
    
    
    /**
     * Create a new event in the Church Community Builder system.
     * 
     * @param int      $group_id
     * @param DateTime $start_date
     * @param DateTime $end_date
     * @param array    $options
     * 
     * @return ... The profile of the event that was created.
     */
    public function createEvent($group_id, DateTime $start_date, DateTime $end_date, $name, array $options = []) {
        $options['group_id'] = $group_id;
        $options['start_date'] = $start_date; // TODO(evan): Convert date to string
        $options['end_date'] = $end_date; // TODO(evan): Convert date to string
        $options['name'] = $name;
        
        return $this->client->srv('create_event', $options, 'POST');
    }
    
    /**
     * Retrieve the profile for an event identified by its ID.
     * 
     * @param int $id
     * 
     * @return ...
     */
    public function eventProfile($id) {
        return $this->client->srv('event_profile', [
            'id' => $id,
        ]);
    }
    
    /**
     * Get all events created or modified since the given date.
     * 
     * If a date is not provided, all events in the system will be returned.
     * 
     * @param DateTime $modified_since
     * 
     * @return ...
     */
    public function eventProfiles(DateTime $modified_since = null) {
        return $this->client->srv('event_profiles', [
            'modified_since' => $modified_since,
        ]);
    }
}