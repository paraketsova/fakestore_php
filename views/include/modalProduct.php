 <!-- Modal -->
 <div class="modal fade" id="modalProduct" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="ModalLabel">Modal title</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>
    <div class="modal-body">

     <form>
      <div class="mb-3">
       <label for="title" class="form-label">Title</label>
       <input type="text" class="form-control" id="title" />

       <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description"></textarea>
       </div>
       <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" />
       </div>
       <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" />
       </div>
     </form>

    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     <button type="button" class="btn btn-primary">Save changes</button>
    </div>
   </div>
  </div>
 </div>