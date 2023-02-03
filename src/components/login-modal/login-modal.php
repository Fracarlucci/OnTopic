
<!-- Modal HTML -->
<div id="login-modal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">OnTopic Login</h4>
				<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form id="login-form" action="#" method="post">
					<div class="mb-3">
						<label for="login-input-username" class="form-label">Username</label>
						<input type="text" class="form-control" id="login-input-username" required>
					</div>
					<div class="mb-3">
						<label for="login-input-password" class="form-label">Password</label>
						<input type="password" class="form-control" id="login-input-password" required>
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
					<p></p>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#signin-modal">
                    Registrati Adesso
                </button>
			</div>
		</div>
	</div>
</div>     