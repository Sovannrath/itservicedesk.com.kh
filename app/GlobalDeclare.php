<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class GlobalDeclare
{
	public $getStatus;
	public $priority;
	public $impact;
	public $urgency;

	public static function getStatus($getStatus){
		$value = $getStatus;
//    	dd($value);
		switch ($value){
			case 1:
				echo 'Open';
				break;
			case 2:
				echo 'Rejected';
				break;
			case 3:
				echo 'Internal';
				break;
			case 4:
				echo 'In Process';
				break;
			case 5:
				echo 'In Progress';
				break;
			case 6:
				echo 'On Hold';
				break;
			case 7:
				echo'Resolved';
				break;
			case 8:
				echo'Pending';
				break;
			case 9:
				echo 'Re-opened';
				break;
			case 10:
				echo 'Closed';
				break;
			default :
				echo '';
		}
	}
	public static function getStatusColor($getStatus){
		$value = $getStatus;
//    	dd($value);
		switch ($value){
			case 1:
				echo '<i class="fa fa-circle font-xs" style="color:grey"></i>';
				break;
			case 2:
				echo '<i class="fa fa-circle font-xs" style="color:red"></i>';
				break;
			case 3:
				echo '<i class="fa fa-circle font-xs" style="color:darkblue"></i>';
				break;
			case 4:
				echo '<i class="fa fa-circle font-xs" style="color:purple"></i>';
				break;
			case 5:
				echo '<i class="fa fa-circle font-xs" style="color:blue"></i>';
				break;
			case 6:
				echo '<i class="fa fa-circle font-xs" style="color:lightcoral"></i>';
				break;
			case 7:
				echo '<i class="fa fa-circle font-xs" style="color:mediumseagreen"></i>';
				break;
			case 8:
				echo '<i class="fa fa-circle font-xs" style="color:olive"></i>';
				break;
			case 9:
				echo '<i class="fa fa-circle font-xs" style="color:green"></i>';
				break;
			case 10:
				echo '<i class="fa fa-circle font-xs" style="color:grey"></i>';
				break;
			default :
				echo '';
		}
	}
	public static function getPercentage($status){
		$value = $status;
		switch($value){
			case 1:
				echo 0;
				break;
			case 2:
				echo 100;
				break;
			case 3:
				echo 10;
				break;
			case 4:
				echo 30;
				break;
			case 5:
				echo 50;
				break;
			case 6:
				echo 50;
				break;
			case 7:
				echo 90;
				break;
			case 8:
				echo 50;
				break;
			case 9:
				echo 0;
				break;
			case 10:
				echo 100;
				break;
			default:
				echo 0;

		}
	}

    public static function getStatusText($getStatus){
    	$value = $getStatus;
//    	!! If change this value may affect to other function such as ajax in servicedesk Manger Dashboard
    	switch ($value){
		    case 1:
		    	echo '<label style="color:grey">Open</label>';
		        break;
		    case 2:
			    echo '<label style="color:red">Rejected</label>';
			    break;
		    case 3:
			    echo '<label style="color:darkblue">Internal';
			    break;
		    case 4:
			    echo '<label style="color:purple">In Process';
			    break;
		    case 5:
			    echo '<label style="color:blue">In Progress';
			    break;
		    case 6:
			    echo '<label style="color:lightcoral">On Hold';
			    break;
		    case 7:
			    echo'<label style="color:mediumseagreen">Resolved';
			    break;
		    case 8:
			    echo'<label style="color:olive">Pending';
			    break;
		    case 9:
			    echo '<label style="color:lightgreen">Re-opened';
			    break;
		    case 10:
			    echo '<label style="color:green">Closed';
			    break;
		    default :
		    	echo '<label class="label bg-color-darken"></label>';
	    }
	}
	public static function getPriorityColor($priority){
	switch ($priority){
		case 1:
			echo '<i class="fa fa-circle font-xs" style="color:#DBB727"></i>';
			break;
		case 2:
			echo '<i class="fa fa-circle font-xs" style="color:darkgoldenrod"></i>';
			break;
		case 3:
			echo '<i class="fa fa-circle font-xs" style="color:darkorange"></i>';
			break;
		case 4:
			echo '<i class="fa fa-circle font-xs" style="color:red"></i>';
			break;
		case 5:
			echo '<i class="fa fa-circle font-xs" style="color:darkred"></i>';
			break;
		default:
			echo '<i class="fa fa-circle font-xs" style="color:#DBB727"></i>';
	}
}
	public static function getPriority($priority){
		switch ($priority){
			case 1:
				echo 'Low';
				break;
			case 2:
				echo 'Medium';
				break;
			case 3:
				echo 'High';
				break;
			case 4:
				echo 'Very High';
				break;
			case 5:
				echo 'Urgent';
				break;
			default:
				echo 'Low';
		}
	}

	public static function getImpactText($impact){
		switch ($impact){
			case 1:
				echo 'Low';
				break;
			case 2:
				echo 'Medium';
				break;
			case 3:
				echo 'High';
				break;
			default:
				echo 'Invalid';
		}
	}

	public static function getUrgencyText($urgency){
		switch ($urgency){
			case 1:
				echo 'Low';
				break;
			case 2:
				echo 'Medium';
				break;
			case 3:
				echo 'High';
				break;
			default:
				echo 'Invalid';
		}
	}

	public static function getCcManager($EmployeeID){
    	$Employee = Employee::where('EmployeeID', '=', $EmployeeID)->get();
    	$getManagerID = $Employee[0]->Manager;
    	$manager = Employee::where('EmployeeID', '=', $getManagerID)->get();
    	$FullName = $manager[0]->LastName.' '.$manager[0]->FirstName;
    	return $FullName;
	}

	public static function getEmployeeName($EmployeeID){
    	$result = Employee::where('EmployeeID', '=', $EmployeeID)->get();
    	return $result[0]->LastName.' '.$result[0]->FirstName;
	}
	public static function setDateFormat($date){
		$getDate = carbon::parse($date);
		$getDateFormart = $getDate->format('d/m/Y');
		return $getDateFormart;
}


}
