@layout('admin/main')
{{-- Domain new view --}}

@section('content')
{{ Form::open('admin/customer/new','POST',array('class'=>'form-horizontal') ) }}
  <!-- <form class="form-horizontal"> -->
  	 @if (Session::has('login_errors'))
                <div class="alert alert-error">
                    <a class="close" data-dismiss="alert" href="#">x</a>Λανθασμένα στοιχεία. Παρακαλώ προσπαθήστε πάλι.
                </div>  
     @endif    
    <fieldset>
      <div id="legend" class="">
        <legend class="">Νέος πελάτης</legend>
      </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Όνομα*</label>
          <div class="controls">
            <input type="text" placeholder="π.χ Παπαδόπουλος Γιώργος" name="name" class="input-xlarge">
            <!-- <p class="help-block">Supporting help text</p> -->
          </div>
        </div>

    

    <div class="control-group">
          <label class="control-label">Email</label>
          <div class="controls">
          	<input type="text" placeholder="πχ onoma@email.gr" name="email" class="input-xlarge">
         </div>

        </div>

    

    <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="input01">Διεύθυνση</label>
          <div class="controls">
            <input type="text" placeholder="π.χ Ιωακήμ 33" name="address" class="input-xlarge">
            </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Τηλέφωνο</label>
          <div class="controls">
            <input type="text" placeholder="π.χ 2310 423552" name="tel" class="input-xlarge">
          </div>
        </div>

    <div class="control-group">

          <!-- Textarea -->
          <label class="control-label">ΑΦΜ</label>
            <div class="controls">
            <input type="text" placeholder="π.χ 045521142" name="vat" class="input-xlarge">
          </div>
        </div>


        <div class="control-group">
          <!-- Form Actions -->
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save</button>
              <?php echo HTML::link('admin', 'Cancel', array('type'=>'button','class'=>'btn') ); ?>
            </div>
        </div>

    </fieldset>
  </form>
@endsection
