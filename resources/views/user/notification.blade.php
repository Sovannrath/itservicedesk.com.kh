@php
use App\Employee;
use Carbon\Carbon;
use App\Http\Controllers\User\IncidentController;
@endphp
<ul class="notification-body">
	@foreach($notifications as $notification)
	@php
	$data = json_decode($notification->data, true);
	$status = $data["Status"];
    $date = $notification->updated_at;
    $getDate = Carbon::parse($date);
	@endphp
	<li>
		<span class="{{ ($notification->read_at == NULL) ? 'unread' : '' }}">
			<a href="/markAsRead" id="notification-{{$notification->id}}" class="">
                <em class="badge padding-5 no-border-radius bg-color-blueLight pull-left margin-right-5">
				<i class="fa fa-info fa-fw"></i>
			    </em>
                <span class="" style="text-overflow: ellipsis;"><strong></strong> <small> {{$status}}</small><i class="icon-paperclip"></i></span>
				<time>{{ $getDate->diffForHumans() }}</time>

				<span class="subject"></span>
				<span class="msg-body"></span>

			</a>
		</span>
	</li>
	@endforeach
	<div class="text-center" style="padding: 5px; margin:5px;"><a href="#">See all</a></div>
</ul>