<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Dashboard I Admin Panel</title>
<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>


<body>

<header id="header">
	<h1 class="site_title">Bartender Portal</h1>
	<h2 class="section_title">Keg Inventory System</h2>
</header>
<!-- end of header bar -->

<section id="secondary_bar">
	<div class="user">
			<p>Bartender Name</p>
	</div>
	<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a class="current">Bartender &mdash; Dashboard</a></article>
	</div>
</section>
<!-- end of secondary bar -->


<aside id="sidebar" class="column">
	<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
	</form>

	<ul class="toggle">
		<li class="icn_photo"><a href="{{ route('keg.index') }}">Admin Display</a></li>
	</ul>

<hr />


<hr />

	<p><strong>Copyright &copy; Keg Inventory System</strong></p>
	<p>ISTM 6213 | Enterprise Web and Database Applications
		<br />
		 Fall 2016 | Team 5 Project
	</p>
</aside>
<!-- end of sidebar -->




<section id="main" class="column">
  <br />

  @yield('keg')
	@yield('kegform')
	@yield('kegsizeform')
	@yield('kegsizedata')
  @yield('beerform')
	@yield('beerdata')
	@yield('locationform')
	@yield('locationdata')
	@yield('lifecycleform')
	@yield('lifecycledata')
	@yield('categoryform')
	@yield('categorydata')
	@yield('fermenterform')
	@yield('fermenterdata')
	@yield('bartender')
	@yield('bartenderform')
	@yield('googlemaps')

<br />
<!--
	<div>
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-comments fa-5x"></i>
	</div>
<div class="col-xs-9 text-right">
<div>26</div>
<div>New Comments!</div>
</div>
</div>
</div>
<a href="#">
<div class="panel-footer">
<span class="pull-left">Create</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
-->
<!--
<div class="clear"></div>
<article class="module width_full">
<header><h3>Stats</h3></header>
<div class="module_content">
<article class="stats_graph">
<img src="http://chart.apis.google.com/chart?chxr=0,0,3000&chxt=y&chs=520x140&cht=lc&chco=76A4FB,80C65A&chd=s:Tdjpsvyvttmiihgmnrst,OTbdcfhhggcTUTTUadfk&chls=2|2&chma=40,20,20,30" width="520" height="140" alt="" />
</article>

<article class="stats_overview">
<div class="overview_today">
<p class="overview_day">Today</p>
<p class="overview_count">1,876</p>
<p class="overview_type">Hits</p>
<p class="overview_count">2,103</p>
<p class="overview_type">Views</p>
</div>
<div class="overview_previous">
<p class="overview_day">Yesterday</p>
<p class="overview_count">1,646</p>
<p class="overview_type">Hits</p>
<p class="overview_count">2,054</p>
<p class="overview_type">Views</p>
</div>
</article>
<div class="clear"></div>
</div>
</article>
<!- end of stats article ->
-->


<div class="clear"></div>



</section>


</body>

</html>
