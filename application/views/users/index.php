				<div class="row">
					<div class="card-deck w-100">
						<?php foreach ($users as $users_item): ?>

							<div class="card">
								<a href="<?= base_url('/profile/' . $users_item['usr_nick']); ?>"></a>
								<div class="card-body">
									<h5 class="card-title"><?= $users_item['usr_nick']; ?></h5>
									<p class="card-text"><?= $users_item['prf_mail']; ?></p>
								</div>
								<div class="card-footer text-muted">
									<?php if ($this->session->prf_act === 'A'): ?>
										<div class="btn-group">
											<a class="btn" href="<?= base_url('users/edit/' . $users_item['usr_nick'] . '/' . $users_item['usr_id']) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											<a class="btn" href="#" data-toggle="modal" data-target="#deleteConfirm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
										</div>
									<?php endif; ?>
									<small>registered <?= timespan(human_to_unix($users_item['prf_date']), time(), 1); ?> ago</small>
								</div>

								<div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="deleteConfirmTitle">Delete user</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p>You are about to delete this user: <i><?= $users_item['usr_nick']; ?></i></p>
												<p>Are you sure about that?</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
												<a class="btn btn-danger" href="<?= base_url('users/delete/' . $users_item['usr_nick'] . '/' . $users_item['usr_id']) ?>">Sure!</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>

					</div>
				</div>
