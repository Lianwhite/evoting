<?php
function requests($result, $title, $x){
    $index = 0;
    foreach($result as $resultp){
        echo ($index == 0)?'<h4 class="text-center modalTitle">'.$title.' requests</h4>':'';
        $index = 1;
        echo '<div class="current"> <ul class="list-group">
        <li class="list-group-item justify-content-center align-items-center mx-auto">
            <img src="'.$resultp["passport"].'" class="candidate-avatar" alt="avatar">
        </li>
    </ul>
    
      <table class="table table-striped">
    <tbody>
    <tr>
      <th scope="row">Name</th>
      <td>'.$resultp["first_name"].' '.$resultp["last_name"].'</td>
    </tr>
    <tr>
      <th scope="row">Party</th>
      <td>'.$resultp["party"].'</td>
    </tr>';
    if($x == 0){
    echo '<tr>
      <th scope="row">Position</th>
      <td>'.$resultp["position"].'</td>
    </tr>
    <tr>
      <th scope="row">Date of Birth</th>
      <td>'.$resultp["dob"].'</td>
    </tr>';
}
    echo '</tbody>
    </table>
    <ul class="list-group">
    <li class="list-group-item justify-content-center align-items-center mx-auto">Credential
        </li>
        <li class="list-group-item justify-content-center align-items-center mx-auto">
            <img src="'.$resultp["credential"].'" class="img-fluid" style="max-width: 400px; max-height: 400px;">
        </li>
    </ul>
        <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-4" style="text-align: right; padding-top: 20px;">
            <form method="post" class="declineform">
            <input type="text" value="';
            echo ($x == 0)?($resultp["id"].'_'.$resultp["position"].'_'.$resultp["party"]):($resultp["no"]);
            echo '" name="decline" style="display: none;" />
            <input type="submit" value="Decline" name="declinebutton" class="btn btn-secondary adecline" />
            </form>
            </div>
            <div class="col-md-4" style="text-align: left; padding-top: 20px;">
            <form method="post" class="approvalform">
            <input type="text" value="';
            echo ($x == 0)?($resultp["id"].'_'.$resultp["position"].'_'.$resultp["party"]):($resultp["no"]);
            echo '" name="submitVote" style="display: none;" />
            <input type="submit" value="Approve" name="approvebutton" class="btn btn-primary asubmit" />
            </form>
            </div>
            <div class="col-md-2"></div>
        </div><hr><hr><hr> </div>';
    }
}

if($candidateCheck){
    requests($result1, "Election Candidates", 0);
}
if($partyLeaderCheck){
    requests($result2, "Party Leaders ", 1);
}


// if($candidateCheck){
//     $index = 0;
//     foreach($result1 as $resultp){
//         echo ($index == 0)?'<h4 class="text-center" style="color: #055277;">Election Candidate requests</h4>':'';
//         $index = 1;
//         echo '<ul class="list-group">
//         <li class="list-group-item justify-content-center align-items-center mx-auto">
//             <img src="'.$resultp["passport"].'" class="candidate-avatar" alt="avatar">
//         </li>
//     </ul>
    
//       <table class="table table-striped">
//     <tbody>
//     <tr>
//       <th scope="row">Name</th>
//       <td>'.$resultp["first_name"].' '.$resultp["last_name"].'</td>
//     </tr>
//     <tr>
//       <th scope="row">Party</th>
//       <td>'.$resultp["party"].'</td>
//     </tr>
//     <tr>
//       <th scope="row">Position</th>
//       <td>'.$resultp["position"].'</td>
//     </tr>
//     <tr>
//       <th scope="row">Date of Birth</th>
//       <td>'.$resultp["dob"].'</td>
//     </tr>
//     </tbody>
//     </table>
//     <ul class="list-group">
//     <li class="list-group-item justify-content-center align-items-center mx-auto">Credential
//         </li>
//         <li class="list-group-item justify-content-center align-items-center mx-auto">
//             <img src="'.$resultp["credential"].'" class="img-fluid" style="max-width: 400px; max-height: 400px;">
//         </li>
//     </ul>
//         <div class="row">
//         <div class="col-md-2"></div>
//             <div class="col-md-4" style="text-align: right; padding-top: 20px;">
//             <form method="post" class="declineform">
//             <input type="text" value="'.$resultp["id"].'_'.$resultp["position"].'_'.$resultp["party"].'" name="decline" style="display: none;" />
//             <input type="submit" value="Decline" name="declinebutton" class="btn btn-secondary adecline" />
//             </form>
//             </div>
//             <div class="col-md-4" style="text-align: left; padding-top: 20px;">
//             <form method="post" class="approvalform">
//             <input type="text" value="'.$resultp["id"].'_'.$resultp["position"].'_'.$resultp["party"].'" name="submitVote" style="display: none;" />
//             <input type="submit" value="Approve" name="approvebutton" class="btn btn-primary asubmit" />
//             </form>
//             </div>
//             <div class="col-md-2"></div>
//         </div><hr><hr><hr>';
//     }
    
// }else{
//     echo '<ul class="list-group">
//     <li class="list-group-item justify-content-center align-items-center mx-auto">No pending request!
//         </li>
//     </ul>';
// }
?>