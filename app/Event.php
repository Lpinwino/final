<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $table = 'events';

	protected $fillable = [ 'user_id','title', 'concept', 'department', 'objetives', 'impact_studTeach', 'description' ,'date_event', 'end_event', 'teacherEnvol', 'picture'];

	public function user(){
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function allEvents(){
		$query = $this->db->get('events');
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		return object();
	}
	public function checkTime( $date )
	{
		$query = DB::table('events')
							->whereBetween('date', ['date_event','end_event'])->get();
		return $this;
	}

	public function checkAvailableTime($date_event, $end_event){
		/*$result = $this->where('date_event', '>=', $date_event)
				 		->where('date_event', '<', $date_event)
				 		->orWhere(function($query) use ($date_event){
				 			$query->where('end_event', '>=', 'events.date_event')
				 					->where('end_event', '<=', $date_event);
				 		})->toSql();
		echo $result;*/
		$query = "select * from events where '{$date_event}' between date_event and end_event";
		$result = \DB::select($query);
		echo $query;
		if( count( $result ) == 0 )
			return true;
		return false;
	}
	// Schedules::where('date_time', '>=',DB::raw('NOW()'))
	// 		->has('UsersInSchedules', '<', DB::raw('available_spots'))
	// 		->select(array(DB::raw('CONCAT(DATE_FORMAT(DATE_ADD(date_time, INTERVAL '.$diff.' Hour),\'%d/%b/%Y %H:%i %p\'), \' - \', DATE_FORMAT(DATE_ADD(date_time, INTERVAL \''.round($diff).':45\' Hour_MINUTE), \'%H:%i %p\'), " ('.$location['timezone'].')") as datetime'), 'id'));
}
