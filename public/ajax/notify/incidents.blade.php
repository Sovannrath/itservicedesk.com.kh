<ul class="notification-body">
	<ul class="notification-body">
	@foreach(App\Incident::all() as Incident)
	<li>
		<span class="unread">
			<a href="javascript:void(0);" class="msg">
				<img src="img/avatars/4.png" alt="" class="air air-top-left margin-top-5" width="40" height="40" />
				<span class="from">John Doe <i class="icon-paperclip"></i></span>
				<time>2 minutes ago</time>
				<span class="subject">Msed quia non numquam eius modi tempora</span>
				<span class="msg-body">Hello again and thanks for being a part of the newsletter. </span>
			</a>
		</span>
	</li>
	@endforeach
</ul>
</ul>