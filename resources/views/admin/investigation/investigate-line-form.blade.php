<form id="fm_add_step" class="smart-form">
	{{ csrf_field() }}
	<fieldset>
		<div class="row">
			<section>
				<label class="input"> <i class="icon-append fa fa-comment"></i>
					<input type="text" id="description" name="description" placeholder="Enter your description">
				</label>
			</section>
        </div>
		<div class="row">
			<section>
				<label class="input"> <i class="icon-append fa fa-calendar"></i>
					<input type="text" name="reference" id="reference" placeholder="Enter your Reference">
				</label>
			</section>
		</div>
		<div class="row">
			<section>
				<label class="input"> <i class="icon-append fa fa-calendar"></i>
					<input type="text" name="comment" id="comment" placeholder="Enter your comment">
				</label>
			</section>
		</div>
		<div class="row">
			<section>
				<label class="select">
					<select name="status" id="status">
						<option value="1">True</option>
						<option value="0">False</option>
					</select> <i></i>
				</label>
			</section>
		</div>
	</fieldset>
</form>