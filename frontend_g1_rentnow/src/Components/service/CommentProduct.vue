<template>      
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="border:2px solid yellow;">
      <div class="modal-header" style="background: linear-gradient(90deg, #722CB3 30%, #C49BE9);  ">
        <h5 class="modal-title text-white" id="exampleModalLabel" >Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <!-- <label for="message-text" class="col-form-label">Comment:</label> -->
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send Comment</button>
      </div>
    </div>
  </div>
</div>
</template>
