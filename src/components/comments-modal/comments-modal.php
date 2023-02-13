<!-- Modal -->
<div class="modal fade" id="comments-modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-comment" role="document"> <!-- modal-dialog-centered -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Commenti</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body modal-body-comment">
                <ul id="commentsList"></ul>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <form action="#" id="commentForm" class="m-0">
                        <div class="row">
                            <div class="d-flex col-10 justify-content p-0">
                                <label for="commentText"></label> 
                                <input id="commentText" class="w-100" type="text" placeholder="Scrivi un commento..." required/>
                            </div>
                            <input type="hidden" id="postHidden" value=""/>
                            <div class="d-flex col-2 justify-content-center p-0">
                                <button id="sendComment" type="submit">Invia</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
