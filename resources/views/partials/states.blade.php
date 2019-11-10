  @if(!$has_selected_state) 
    <!-- Modal Order Form -->
      <div id="select-state-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Select your province</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{route('set-state')}}">
                @csrf()
                <div class="form-group">
                  <select id="selected-state" name="selected_state" class="form-control" >
                    <option value="">-- Select State --</option>
                    @foreach($states as $state_id => $state)
                        <option value="{{$state_id}}">{{ucwords($state)}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn">Apply</button>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      @push('js')
        <script>
        $(document).ready(function(){
            $("#select-state-modal").modal('show');
        });
        </script>
      @endpush
  
  @endif
