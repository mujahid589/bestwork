<?php
$query=select("contract","where pid='$pid'");
$sum=0;
while ($row=records($query)) {
    $conid=$row['conid'];
  $jid=$row['jid'];

  $query2=select("jobs","where jobid='$jid'");
  $jdata=records($query2);

  $query3=select("escrow","where contarctid='$conid' and status=1");
  $edata=records($query3);
  $sum=$sum + $edata['amount'];
}
 ?>
<div class="margin">

</div>
<div class="container">

<div class="row">
  <div class="col-md-6">
    <h2>My Earnings Statistics</h2>
  </div>

  <div class="col-md-6 text-right">
    <h5 style="margin-top:10px">Available Balance: 0.00 $</h5>
  </div>

  <div class="col-md-12 text-left">
    <div class="_card">
      <!-- Nav pills -->
<ul class="nav nav-pills" id="estats">
  <li class="nav-item col-md-4">
    <a class="nav-link active" data-toggle="pill" href="#home">On Going Projects</a>
    <h3>500.00 USD</h3>
  </li>
  <li class="nav-item col-md-4">
    <a class="nav-link" data-toggle="pill" href="#menu1">Pending Clearance</a>
    <h3>230.00 USD</h3>
  </li>
  <li class="nav-item col-md-4">
    <a class="nav-link" data-toggle="pill" href="#menu2">Available Balance</a>
    <h3>120.00 USD</h3>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content text-left">
  <hr>
  <div class="margin">

  </div>
  <div class="tab-pane container active" id="home">

<table class="table table-striped table-bordered nowrap">
  <tr>
    <th>Project Title</th>
    <th>Price</th>
    <th>Remaining Time</th>
    <th>Status</th>
  </tr>
  <tr>
    <td>Website for Accountancy</td>
    <td>100$</td>
    <td>3d, 2h</td>
    <td><label class="badge badge-success"> Active </label></td>
  </tr>
</table>


  </div>
  <div class="tab-pane container fade" id="menu1">

    <table class="table table-striped table-bordered nowrap">
      <tr>
        <th>Clearance Date</th>
        <th>Project Title</th>
        <th>Price</th>
        <th>Completed On</th>
      </tr>
      <tr>
        <td><i>03 Feb 2021</i></td>
        <td>Website for Accountancy</td>
        <td>100$</td>
        <td>28 Jan 2021</td>
      </tr>
    </table>



  </div>
  <div class="tab-pane container fade" id="menu2">

    <table class="table table-striped table-bordered nowrap">
      <tr>
        <th>Cleared On</th>
        <th>Project Title</th>
        <th>Price</th>
        <th>Completed On</th>
      </tr>
      <tr>
        <td><i>03 Feb 2021</i></td>
        <td>Website for Accountancy</td>
        <td>100$</td>
        <td>28 Jan 2021</td>
      </tr>
    </table>

  </div>
</div>
    </div>
  </div>

</div>


</div>
<div class="margin">

</div>
