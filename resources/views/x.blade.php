<!-- DELETE MODAL -->
<?php foreach ($borrowers as $borrower): ?>
  <div class="modal fade" id="myModal{{$borrower->id}}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form action="create/{{$borrower->id}}" method="POST">
        <!-- Modal body -->
        <div class="modal-body">
          Are you sure you want to delete?
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          {{ csrf_field() }}
          @method('DELETE')                
          <button type="submit" name="submit" value="Delete" class="btn btn-danger">Yes</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
       </form> 
      </div>
    </div>
  </div>
  <?php endforeach ?>


  <!-- <td><a href="/create/{{$borrower->id}}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="ti ti-eye"></i>
                                                </button>
                                            </a>
                                            <a href="/create/{{$borrower->id}}/edit">
                                                <button class="btn btn-success btn-sm">
                                                    <i class="ti ti-pencil-alt"></i>
                                                </button>
                                            </a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{$borrower->id}}"><i class="ti ti-trash"></i></button>
                                            </td> -->