@extends('layouts.app')

@section('content')
    @include('_titularHeader')
    @if(session("message"))
            <div  class="modal hide fade" id="successPetition" tabindex="-1" role="dialog" aria-labelledby="ModalSuccessPetition" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Informació</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <p>{{session("message")}}</p>
                    </div>
                  </div>
                </div>
              </div>
    @endif
    @include('_batchesAvaliables')
@endsection

