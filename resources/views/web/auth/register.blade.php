@if(isset($apartment))
<div class="modal col-lg-8" id="register-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
              <div class="d-flex justify-content-end gap-5 text-center">
               
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                <div class="btn-group d-block d-md-flex justify-content-md-between gap-3 mt-2">
                   <b >Candidater</b>
                </div>
                <div class="text-center d-flex align-items-center my-3">
                  
                </div>
                <form action="{{ route('storeLocataire', ['apartment_id' => $apartment->id]) }}" method="POST">
                  @csrf
                   
                        <div class="form-group mb-3">
                            <input class="form-control rounded-pill @error('first_name') is-invalid @enderror" type="text"
                                   value="{{old('first_name')}}" name="first_name" placeholder="Prénom">
                            @error('first_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input class="form-control rounded-pill @error('last_name') is-invalid @enderror" type="text"
                                   value="{{old('last_name')}}" name="last_name" placeholder="Nom">
                            @error('last_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6"></div>
                        <div class="form-group mb-3 ">
                            <input class="form-control rounded-pill @error('email') is-invalid @enderror" type="email"
                                   value="{{old('email')}}" name="email"
                                   placeholder="Adresse email">
                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6"></div>
                    
                        <div class="form-group mb-3">
                          <input class="form-control rounded-pill @error('phone') is-invalid @enderror" type="text"
                                 value="{{old('phone')}}" name="phone" placeholder="Numero">
                          @error('phone')
                          <span class="invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                        <button id="registerButton" class="btn btn-main" style="width: 100%">S'enregistrer</button>

                </form>
                <div>
                    <small>En cliquant sur le "S'enregistrer" je confirme que j'accepte les
                    <a href="#" class="text-main">conditions d'utilisation.</a></small>
                </div>
                <div class="float-end">
                    <small>J'ai déjà un compte <a href="" class="text-main">Se connecter</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<script>
   $(document).ready(function() {
    $('#register-modal form').submit(function(event) {
      // Prevent the form from submitting automatically
      event.preventDefault();

      // Get the form data
      var form = $(this);
      var formData = form.serialize();

      // Send an AJAX request to the server
      $.ajax({
        url: "{{ route('storeLocataire', ['apartment_id' => $apartment->id]) }}",
        method: form.attr('method'),
        data: formData,
        success: function(response) {
          // Check the validation result from the controller
          if (response.success) {
            // Validation passed, close the modal
            $('#register-modal').modal('hide');
          } else {
            // Validation failed, display error messages
            // ...
          }
        },
        error: function(error) {
          // Handle the error response
          console.log(error);
          // Optionally, you can display error messages or perform other actions
          // ...
        }
      });
    });

    $('#register-modal').on('hide.bs.modal', function(event) {
      var formSubmitted = $('#register-modal').data('form-submitted');
      if (!formSubmitted) {
        // Prevent the modal from closing if the form is not submitted
        event.preventDefault();
      }
    });
  });
  </script>


