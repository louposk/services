@layout('admin/main')
{{-- Domain new view --}}

@section('content')
{{ Form::open('admin/domain/new','POST',array('class'=>'form-horizontal') ) }}
  <!-- <form class="form-horizontal"> -->
  	 @if (Session::has('login_errors'))
                <div class="alert alert-error">
                    <a class="close" data-dismiss="alert" href="#">x</a>Λανθασμένα στοιχεία. Παρακαλώ προσπαθήστε πάλι.
                </div>  
     @endif    
    <fieldset>
      <div id="legend" class="">
        <legend class="">Νέο Domain</legend>
      </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Όνομα*</label>
          <div class="controls">
            <input type="text" placeholder="π.χ www.projectteam.gr" name="name" class="input-xlarge">
            <!-- <p class="help-block">Supporting help text</p> -->
          </div>
        </div>

    

    <div class="control-group">
          <label class="control-label">Κατοχύρωση*</label>
          <div class="controls">
          	<input type="text" placeholder="πχ 2012-11-11" name="registration" class="input-xlarge datepicker">
         </div>

        </div>

    

    <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="input01">Λήξη*</label>
          <div class="controls">
            <input type="text" placeholder="π.χ 2012-12-12" name="expiration" class="input-xlarge datepicker">
            </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Dns1</label>
          <div class="controls">
            <input type="text" placeholder="π.χ ns1.projectteam.gr" name="dns1" class="input-xlarge">
          </div>
        </div>

    <div class="control-group">

          <!-- Textarea -->
          <label class="control-label">Dns2</label>
            <div class="controls">
            <input type="text" placeholder="π.χ ns2.projectteam.gr" name="dns2" class="input-xlarge">
          </div>
        </div>

    <div class="control-group">

          <!-- Textarea -->
          <label class="control-label">Κωδικός εξουσιοδότησης</label>
            <div class="controls">
            <input type="text" placeholder="π.χ 34ytcr6" name="epp" class="input-xlarge">
          </div>
        </div>

    <div class="control-group">

          <!-- Textarea -->
          <label class="control-label">Τιμή</label>
          <div class="controls">
            <input type="text" placeholder="π.χ 40" name="price" class="input-xlarge">
          </div>
        </div>

    

    <div class="control-group">
          <label class="control-label">Ιδιοκτήτης*</label>
          <div class="controls">

                      <!-- Multiple Checkboxes -->
            <label class="select">
        <select name='customer_id'>
        <option selected>--Επιλογή ιδιοκτήτη--</option>
              <?php foreach ($customers as $customer) {
                  echo '<option value='.$customer->id.'>'.$customer->name.'</option>';
                } ?>
              </select>
              <?php //echo Form::select('mainland_id', 
                // foreach ($mainlands as $mainland) {
                //  echo $mainland->id.' => '.$mainland->name.',';
                // }
                // ,'==Select Mainland=='); ?>

              <!-- <input type="checkbox" name="visible" checked="checked"> -->
            </label>
          </div>
            
    </div>

    <div class="control-group">

          <!-- Textarea -->
          <!-- <label class="control-label">Κατάσταση</label> -->
          <div class="controls">
            <input type="hidden" placeholder="π.χ 40" name="status" value='1' class="input-xlarge">
          </div>
    </div>

        <div class="control-group">
          <!-- Form Actions -->
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save</button>
              <?php echo HTML::link('admin/domain', 'Cancel', array('type'=>'button','class'=>'btn') ); ?>
            </div>
        </div>

    </fieldset>
  </form>
@endsection
