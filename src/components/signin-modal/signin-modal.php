
<!-- Modal HTML -->
<div id="signin-modal" class="modal fade">
	<div class="modal-dialog modal-signin">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">OnTopic Registrati</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form id="signin-form" action="#" method="post">
					<div class="mb-3">
						<label for="signin-input-name" class="form-label">Nome</label>
						<input type="text" class="form-control" id="signin-input-name" required>
					</div>
					<div class="mb-3">
						<label for="signin-input-surname" class="form-label">Cognome</label>
						<input type="text" class="form-control" id="signin-input-surname" required>
					</div>
                    <div class="mb-3">
						<label for="signin-input-username" class="form-label">Username</label>
						<input type="text" class="form-control" id="signin-input-username" required>
					</div>
                    <div class="mb-3">
						<label for="signin-input-email" class="form-label">Email</label>
						<input type="email" class="form-control" id="signin-input-email" required>
					</div>
                    <div class="mb-3">
						<label for="signin-input-password" class="form-label">Password</label>
						<input type="password" class="form-control" id="signin-input-password" required>
					</div>
					<button type="submit" class="btn btn-primary">Registrati</button>
					<p></p>
				</form>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#login-modal">
                    Effettua il Login
                </button>
			</div>
		</div>
	</div>
</div>     