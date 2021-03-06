<html>

<head>
  <title><?= $generalData['name']?></title>

  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/backoffice.css'); ?>" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

   <div class="container" style="margin-top: 10px;">



     <div class="row">



       <div class="col-lg-12 mb-4">

         <h4 class="mt-4 mb-3" style="float: right;"><b>User Profile</b></h4>

         <p class="mt-4 mb-3" style="float: right; font-size: 14px;"></p>
         <div class="clearfix"></div>

         <div style="background: black; color: white; padding: 10px; height: 40px;">
           <p><b><?= $generalData['name']?></b></p>
         </div>
         <br>
         <p style="font-size: 15px;"><b>E-Mail Address:</b> <?=$generalData['email']?><br><b>Mobile Number:</b> +91-<?=$generalData['mobile']?><br><b>Location:</b> <?= $generalData['city']?>, <?=$generalData['state']?></p>

         <hr>
         <?php if($generalData['accountType'] == 1){?>
         <div class="table-responsive">
         <b>Educational Details</b>
          <?php if(!empty($educationalDetails)){?>
             <table class="table" style="width: 100%; margin-top: 20px; font-size: 15px;">
               <thead>
                 <tr>
                   <th>Educational Category</th>
                   <th>School/Board/College/University</th>
                   <th>Year</th>
                   <th>Score</th>
                 </tr>
               </thead>
               <tbody>
                <?php foreach ($educationalDetails as $key => $education) {?>
                 <tr>
                   <td><b><?php if($education['educationType'] == 1){echo "High School";}elseif($education['educationType'] == 2){echo "Senior Secondary";}elseif($education['educationType'] == 3){echo "Graduation";}else{echo "Post-Graduation";}?></b> <?php if($education['status'] == 2){?><i class="fa fa-check-circle"></i><?php } ?></td>
                    <?php if($education['educationType'] == 1 || $education['educationType'] == 2){?>
                     <td><?= $education['institute']?></td>
                    <?php } ?>
                    <?php if($education['educationType'] == 3 || $education['educationType'] == 4){?>
                    <td><?= $education['college']?></td>
                    <?php } ?>
                   <td><?= $education['year']?></td>
                   <td><?= $education['score']?> <?php if($education['scoreType'] == 1){echo "CGPA";}else{echo "%";}?></td>
                 </tr>
                 <?php } ?>
               </tbody>
             </table>
             <?php }else{
              echo "<center><b>No Education Found.</b></center>";
             } ?>
          </div>

          <hr>

          <b>Work-Experience</b>
          <ul style="font-size: 15px; margin-top: 15px;">
            <?php if(!empty($workExperience)){?>
            <?php foreach ($workExperience as $key => $experience) { ?>
              <li><b><?= $experience['companyName']?></b><br><?= $experience['position'] ?><br><?= $experience['startMonth']?> <?= $experience['startYear']?> - <?php if($experience['currentlyWorking'] == 1){echo "Present";}else{?><?= $experience['endMonth']?> <?= $experience['endYear']?><?php } ?><br><br><b>Role: </b><?= $experience['role']?></li>
            <?php }}else{ echo "<center><b>No Work-Experience Found.</b></center>";}?>
          </ul>
        <?php }else{ ?>
          <b>Company Details</b>
          <br><br>
          <p style="font-size: 15px;"><b>Company Name:</b> <?=$companyData['companyName']?><br><b>Company Description:</b> <?php if($companyData != ""){ echo $companyData['companyDescription'];}else{echo "NA";}?></p>
        <?php } ?>
          <hr>

       </div>
     </div>
     <p style="float: right; font-size: 12px;"><b>Note: </b><i class="fa fa-check-circle"></i> indicates a verified detail, verified by Not Retire. Details without <i class="fa fa-check-circle"></i> are claimed by the user and not verified by Not Retire</p>
     <div class="clearfix"></div>
     <div style="background: black; color: white; padding: 10px; height: 35px;">
       <center><p style="font-size: 12px;">Profile generated by <b>Not Retire</b> as, on <i><?php date_default_timezone_set('Asia/Kolkata');
echo date('d-F-Y h:i A');?></i></p></center>
     </div>

   </div>



   <script src="http://localhost.hn/assets/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost.hn/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>
