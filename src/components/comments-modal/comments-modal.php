<!-- Modal -->
<div class="modal fade" id="comments-modal" role="dialog" aria-labelledby="comments" aria-hidden="true">
    <div class="modal-dialog" role="document"> <!-- modal-dialog-centered -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Commenti</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <ul id="commentsList"></ul>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <form id="commentForm" class="m-0" onSubmit="return false;">
                        <div class="row">
                            <div class="d-flex col-10 justify-content p-0">
                                <input class="w-100" type="text" id="commentText" placeholder="Scrivi un commento..." onkeypress="inserisciCommento(this.form)"/>
                            </div>
                            <div class="d-flex col-2 justify-content-center p-0">
                                <button id="sendComment" type="button" onclick="inserisciCommento(this, this.form)">Invia</button>
                            </div>
                            <input type="hidden" id="postHidden" value=""/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
