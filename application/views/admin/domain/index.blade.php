@layout('admin/main')

@section('content')
@if (Session::has('status'))
    <div class="alert alert-error">
        <a class="close" data-dismiss="alert" href="#">x</a>{{Session::get('status')}}
    </div>  
@endif 

@if (Session::has('mail'))
    <div class="alert alert-error">
        <a class="close" data-dismiss="alert" href="#">x</a>{{Session::get('mail')}}
    </div>  
@endif 
<div class="btn-toolbar">
	<?php echo HTML::link('admin/domain/new','Νέο Domain', array('class'=>'btn btn-primary')); ?>

</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>Κατάσταση</th>
          <th>Domain</th>
          <th>Λήξη</th>
          <th>Κόστος</th>
          <th style="width: 36px;">Ενέργειες</th>
        </tr>
      </thead>
      <tbody>
      	@foreach ($domains as $domain)
      	<tr>
          <td>{{$domain->status}}</td>
          <td>{{$domain->name}}</td>
          <td>{{ date('Y-m-d', strtotime($domain->expiration)) }}</td>
          <td>{{$domain->price}}</td>
          <td>
            <?php echo HTML::decode(HTML::link('admin/domain/edit/'.$domain->id, '<i class="icon-pencil"></i>' )); ?>
            <?php echo HTML::decode(HTML::link('admin/domain/delete/'.$domain->id, '<i class="icon-remove"></i>', array('role'=>'button', 'data-toggle'=>'modal') )); ?>
              <!-- <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a> -->
          </td>
        </tr>
      	@endforeach
      </tbody>
    </table>
</div>
<div class="pagination">
    <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div>
<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Επιβεβαίωση διαγραφής</h3>
    </div>
    <div class="modal-body">
        <p class="error-text">Είσαι σίγουρος για την διαγραφή?</p>
    </div>
    <div class="modal-footer">

    	<?php echo HTML::link('admin/domain', 'Ακύρωση', array('class'=>'btn', 'data-dismiss'=>'modal','aria-hidden'=>'true') ); ?>

        <button class="btn" data-dismiss="modal" aria-hidden="true">Ακύρωση</button>
        <?php echo HTML::link('admin/domain/delete/'.$domain->id, 'Διαγραφή', array('class'=>'btn btn-danger', 'data-dismiss'=>'modal') ); ?>

    </div>
</div>
@endsection