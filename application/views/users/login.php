				<?php echo validation_errors('
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<p>',
						'</p>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				'); ?>

				<div class="card">
					<h5 class="card-header"><?= $title; ?></h5>

					<div class="card-body">
						<?php echo form_open('users/login', 'class="form-inline"'); ?>
							<label class="sr-only" for="username">Username</label>
							<div class="input-group mb-2 mr-sm-2">
								<div class="input-group-prepend">
									<div class="input-group-text">@</div>
								</div>
								<input class="form-control pl-2" id="username" name="username" type="text" placeholder="Username" />
							</div>

							<label class="sr-only" for="password">Password</label>
							<div class="input-group mb-2 mr-sm-2">
								<div class="input-group-prepend">
									<div class="input-group-text">Password</div>
								</div>
								<input class="form-control pl-2" id="password" name="password" type="password" placeholder="Password" />
							</div>

							<button class="btn btn-primary mb-2" type="submit" name="submit">Submit</button>
						</form>
					</div>
				</div>
