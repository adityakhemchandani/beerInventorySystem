<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Dashboard I Admin Panel</title>
<link rel="stylesheet" href="../css/layout.css" type="text/css" media="screen" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>


<body>

<header id="header">
	<h1 class="site_title">Admin Portal</h1>
	<h2 class="section_title">Keg Inventory System</h2>
</header>
<!-- end of header bar -->

<section id="secondary_bar">
	<div class="user">
			<p>Manager Name</p>
	</div>
	<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a class="current">Admin &mdash; Dashboard</a></article>
	</div>
</section>
<!-- end of secondary bar -->


<aside id="sidebar" class="column">
	<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
	</form>

	<ul class="toggle">
		<li class="icn_photo"><a href="{{ route('bartender.index') }}">Bartender Display</a></li>
	</ul>


<hr />

<h3>Dashboard:</h3>
<ul class="toggle">
	<li class="icn_new_article"><a href="{{ route('keg.create') }}">New Keg</a></li>
	<li class="icn_photo"><a href="{{ route('keg.index') }}">Keg Display</a></li>
</ul>

<h3>Keg Size:</h3>
	<ul class="toggle">
		<li class="icn_new_article"><a href="{{ route('kegsize.create') }}">New Keg Size</a></li>
		<li class="icn_photo"><a href="{{ route('kegsize.index') }}">Keg Size Data</a></li>
	</ul>

<h3>Fermenter:</h3>
	<ul class="toggle">
		<li class="icn_new_article"><a href="{{ route('fermenter.create') }}">New Fermenter</a></li>
		<li class="icn_photo"><a href="{{ route('fermenter.index') }}">Fermenter Data</a></li>
	</ul>

	<ul class="toggle">
<h3>Beer:</h3>
		<li class="icn_new_article"><a href="{{ route('beer.create') }}">New Beer</a></li>
		<li class="icn_photo"><a href="{{ route('beer.index') }}">Beer Display</a></li>
	</ul>

<h3>Location:</h3>
	<ul class="toggle">
		<li class="icn_new_article"><a href="{{ route('location.create') }}">New Location</a></li>
		<li class="icn_photo"><a href="{{ route('location.index') }}">All Locations</a></li>
	</ul>

<h3>Life Cycle:</h3>
	<ul class="toggle">
		<li class="icn_new_article"><a href="{{ route('lifecycle.create') }}">New Lifecycle</a></li>
		<li class="icn_photo"><a href="{{ route('lifecycle.index') }}">All Lifecycles</a></li>
	</ul>

<h3>Category:</h3>
	<ul class="toggle">
		<li class="icn_new_article"><a href="{{ route('category.create') }}">New Category</a></li>
		<li class="icn_photo"><a href="{{ route('category.index') }}">All Categories</a></li>
	</ul>

<hr />

	<p><strong>Copyright &copy; Keg Inventory System</strong></p>
	<p>Enterprise Web and Database Applications</p>
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
<div class="clear"></div>
</section>

</body>
</html>
