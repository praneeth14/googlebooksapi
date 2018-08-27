<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <title>Online Book Search</title>
<style>
body{
	font-family:verdana;
}
</style>
<body>
<div class="container-fluid"> 
 <h2 style="text-align:center;color:#ff0000;"><i class="fas fa-book"></i> Online Book Bank <i class="fas fa-book"></i></h2>
</div><br><br>
<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="get-books.php" method="get" name="search-form">
          <fieldset>
            <legend class="text-center">Search Books</legend>
    
            <!-- Search input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="q">Search Text</label>
              <div class="col-md-9">
                <input id="q" name="q" type="text" placeholder="title,author etc.." class="form-control" required>
              </div>
            </div>
			
			<!-- startIndex-->
            <div class="form-group" style="display:none;">
              <label class="col-md-3 control-label" for="startIndex">startIndex</label>
              <div class="col-md-9">
                <input id="startIndex" name="startIndex" type="number" placeholder="startIndex" class="form-control" value="0" required>
              </div>
            </div>
    
            
			<!--filter-->
			
			<div class="form-group">
              <label class="col-md-3 control-label" for="filter">filter</label>
              <div class="col-md-9">
			  <select class="form-control" id="filter" name="filter">
			  <option value="all" selected="selected">All</option>
<option value="free-ebooks">free-ebooks</option>   
   <option value="ebooks">ebooks</option>
    
    <option value="full">full</option>
    <option value="paid-ebooks">paid-ebooks</option>
	<option value="partial">partial</option>
  </select>
                 </div>
            </div>
			
			<!--orderBy-->
			
			<div class="form-group">
              <label class="col-md-3 control-label" for="orderBy">orderBy</label>
              <div class="col-md-9">
			  <select class="form-control" id="orderBy" name="orderBy">
    <option value="relevance">relevance</option>
    <option value="newest">newest</option>
    
  </select>
                 </div>
            </div>
			
	
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary "><i class='fas fa-search'></i> Search</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>



<!-- Search Rules -->
<div class="container" style="padding:50px;">
<h4 style="color:red;">Search Rules</h4>
<label>Search Text:</label>
<p>Full-text search query string.</p>
<label>filter:</label>
<ul>
<i class="fas fa-arrow-right"></i><span> <b>ebooks</b> - All Google eBooks.</span> <br>
<i class="fas fa-arrow-right"></i><span> <b>free-ebooks</b> - Google eBook with full volume text viewability.</span> <br>
<i class="fas fa-arrow-right"></i><span> <b>full</b> - Public can view entire volume text.</span> <br>
<i class="fas fa-arrow-right"></i><span> <b>paid-ebooks</b> - Google eBook with a price.</span> <br>
<i class="fas fa-arrow-right"></i><span> <b>partial</b> - Public able to see parts of text.</span> <br>
</ul>
<label>orderBy:</label>
<ul>
<i class="fas fa-arrow-right"></i><span> <b>relevance</b> - Relevance to search terms.</span> <br>
<i class="fas fa-arrow-right"></i><span> <b>newest</b> - Most recently published.</span> <br>
</ul>
<div class="text-center">
	Idea By <a href="https://www.linkedin.com/in/mohan-s-v-502a61147/" style="text-decoration: none;" target="_blank">Sv Mohan Kumar</a><br>
	Powered By <a href="http://www.csesmartclass.com/" style="text-decoration: none;" target="_blank">Cse Smart Class</a>
</div>
</div>

</body>
</html>



















