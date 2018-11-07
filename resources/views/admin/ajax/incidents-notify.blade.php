@php
use App\Employee;
use Carbon\Carbon;
use App\Http\Controllers\Admin\IncidentController;
@endphp
<ul class="notification-body">
    @foreach($notifications as $notification)
    @php
    $data = json_decode($notification->data, true);
    $status = $data["Status"];
    @endphp
	<li>
		<span class="{{ ($notification->read_at == NULL) ? 'unread' : '' }}">
			<a href="/markAsRead" id="notification-{{$notification->id}}" class="msg">
				<img src="" alt="" class="air air-top-left margin-top-5" width="40" height="40" />
                <span class=""><strong></strong> <small> {{$status}}</small><i class="icon-paperclip"></i></span>
				<time>{{ IncidentController::getDateDiff($notification->updated_at) }}</time>

				<span class="subject"></span>
				<span class="msg-body"></span>

			</a>
		</span>
	</li>
    @endforeach
    <div class="text-center" style="padding: 5px; margin:5px;"><a href="#">See all</a></div>
</ul>