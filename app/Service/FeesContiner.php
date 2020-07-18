<?php


    namespace App\Service;
    use Illuminate\Support\Facades\Auth;
	use App\FeesMaster;
	use App\FeesCollection;

	class FeesContiner
	{
        // Insert fees amount of a student
		public function insertFeesAmount($data)
		{
			$fees = FeesMaster::active();
            $products = array();
            foreach ($fees as $row) {
                $item['fees_id'] = $row->id;
                $item['fees_groups'] = $row->groups->name;
                $item['fees_type'] = $row->feestypes->name;
                $item['fees_code'] = $row->code;
                $item['due_date'] = $row->date; 
                $item['is_paid'] = null; 
                $item['amount'] = $row->amount; 
                $item['payment_id'] = null; 
                $item['mode'] = null; 
                $item['discount'] = null; 
                $item['fine'] = null; 
                $item['paid'] = null; 
                array_push($products, $item);
            }
          
            FeesCollection::insert([
                'student_id'=> $data->id,
                'collection'=> json_encode($products),
                'session_id' => $data->session_id,
            ]);
		}
	}
