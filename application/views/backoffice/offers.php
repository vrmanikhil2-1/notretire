<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Backoffice|Not Retire</title>

    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/backoffice.css'); ?>" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top nav-bg">
      <div class="container">
        <a class="navbar-brand" href="index.html">Backoffice|Not Retire</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">



            <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Account
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="<?= base_url('backoffice/changePassword')?>">Change Password</a>
                <a class="dropdown-item" href="<?= base_url('backoffice/signout')?>">Sign Out</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->




      <!-- Content Row -->
      <div class="row" style="margin-top: 20px;">
        <!-- Sidebar Column -->
        <div class="col-lg-3 mb-4">
          <div class="list-group">
            <a href="<?= base_url('backoffice/users')?>" class="list-group-item sidebar-item sidebar-active">Users</a>
            <a href="<?= base_url('backoffice/offers')?>" class="list-group-item sidebar-item">Offers</a>
          </div>
        </div>
        <!-- Content Column -->
        <div class="col-lg-9 mb-4">

          <?php if($message['content']!=''){?>
            <ol class="breadcrumb" style="background-color: white !important; margin-top: 20px; border: 1px solid <?=$message['color']?>;">
              <li style="color: <?=$message['color']?>;"><?=$message['content']?></li>
            </ol>
            <?php }?>

          <h4 class="mt-4 mb-3"><b>Offers</b></h4>


          <table id="users" class="table table-striped" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Offer</th>
                      <th>View</th>
                      <th>Approve</th>
                      <th>Reject</th>
                  </tr>
              </thead>

              <tbody>
                  <?php $i = 1; foreach($offers as $offer){?>
                  <tr>
                      <td><?= $i?>.</td>
                      <td><?= $offer['offerTitle']?></td>
                      <td><a href = "<?= base_url('backoffice/viewOfferDetails/'.$offer['offerID'])?>" target = "_blank" class="btn btn-primary" style="color: white;"><b><i class="fa fa-eye"></i></b></a></td>
                      <td><?php if($offer['approved'] == 0){?><button href = "<?= base_url('backoffice/approveOffer/'.$offer['offerID'])?>" class="btn btn-success approve" id = "approveOffer<?= $offer['offerID']?>" data = "<?= $offer['offerID']?>" style="color: white;"><b><i class="fa fa-check"></i></b></button><?php }else if($offer['approved'] == 1){ echo "<p style = 'color: green'>Approved</p>";}?></td>
                      <td><?php if($offer['approved'] == 0){?><button class="btn btn-danger reject" id = "rejectOffer<?= $offer['offerID']?>" data = "<?= $offer['offerID']?>" style="color: white;"><b><i class="fa fa-times"></i></b></button><?php }else if($offer['approved'] == 2){ echo "<p style = 'color: red'>Rejected</p>";}?></td>
                  </tr>
                <?php $i++;}?>
              </tbody>
          </table>

        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark nav-bg">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Campus Puppy Private Limited 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Remarks</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <label><b>Add Remark:</b></label>
          <textarea class = "form-control other" name = "other" placeholder="Remark.."></textarea>
        <div class="candidateData"></div><br>
        <button  class = "form-control btn btn-primary addRemark">Add Remark</button>

      </div>
    </div>

  </div>
</div>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <script>
      $(document).ready(function() {
        $('#users').DataTable();
      } );
    </script>
    <script>

    $(document).ready(function(){
      $('body').on('click', '.reject', function(){
        id = $(this).attr('id')
        data = $('#'+id).attr('data')
        var r = confirm("Click on 'OK' to Proceed with the rejection of the Offer.");
        if (r == true) {
          $('.candidateData').html('<input type="hidden" class = "offerID" name = "offerData" value = "'+data+'">')
          $('#myModal').modal({backdrop: 'static', keyboard: false})
        }
      })
    })

    $(document).ready(function(){
      $('body').on('click', '.addRemark', function(){
        data = $('.offerID').val()
        remark = $('.other').val()
        url = '<?=base_url('backoffice/rejectOffer/')?>'+data
        postData = {
          remark:remark
        }
        $.get(url,postData).done(function(res){
          if(res == 'true'){
            location.reload()
          }else{
            console.log(res)
            location.reload()
          }
        })
      })
    })

    $(document).ready(function(){
      $('body').on('click', '.approve', function(){
        id = $(this).attr('id')
        data = $('#'+id).attr('data')
        url = '<?=base_url('backoffice/approveOffer/')?>'+data
        var r = confirm("Click on 'OK' to Proceed with the acceptance of the Offer.");
        if (r == true) {
        $.get(url).done(function(res){
          if(res == 'true'){
            location.reload()
          }else{
            console.log(res)
            location.reload()
          }
        })
        }
      })
    })


    </script>

  </body>

</html>
