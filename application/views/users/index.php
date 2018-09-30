				<div class="row">
					<div class="card-deck w-100">
						<?php foreach ($users as $users_item): ?>

							<div class="card">
								<div class="card-body">
									<h5 class="card-title"><?php echo $users_item['usr_nick']; ?></h5>
									<p class="card-text"><?php echo $users_item['prf_mail']; ?></p>
								</div>
								<div class="card-footer text-muted">
									<?php if ($this->session->prf_act === 'A'): ?>
										<div class="btn-group">
											<a class="btn btn-primary-outline" href="<?= base_url('users/edit/' . $users_item['usr_nick'] . '/' . $users_item['usr_id']) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											<a class="btn btn-primary-outline" href="<?= base_url('users/delete/' . $users_item['usr_nick'] . '/' . $users_item['usr_id']) ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
										</div>
									<?php endif; ?>
									<small>registered <?php echo timespan(human_to_unix($users_item['prf_date']), time(), 2) ?> ago</small>
								</div>
							</div>
						<?php endforeach; ?>

					</div>
				</div>
