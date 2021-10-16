<div id="mySidenav" class="sidenav">
  <p class="logo" id='logo'><span>R</span>esto</p>
  <a href="../dashboard/" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
  <a href="../customer/" class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Customers</a>
  <a href="../foods/" class="icon-a"><i class="fa fa-cutlery icons" aria-hidden="true"></i> &nbsp;&nbsp;Foods</a>
  <a href="../food_categories/" class="icon-a"><i class="fa fa-bars icons"></i> &nbsp;&nbsp;Food Categories</a>
  <a href="../comment/" class="icon-a"><i class="fa fa-commenting-o icons"></i> &nbsp;&nbsp;Comment</a>
  <a href="../account/" class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Accounts</a>
  <a href="../logout.php" class="icon-a"><i class="fa fa-hand-o-right icons"></i> &nbsp;&nbsp;Sign Out</a>

</div>

<script>
  (function() {
    let backToHome = document.querySelector("#logo");

    backToHome.addEventListener('click', function() {
      window.open("../../", "_self");
    });
  })();
</script>