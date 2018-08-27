 <!DOCTYPE html>
 <html>
 <head>
 <title>Search Results</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="preloader.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  div.polaroid {
  margin:10px;
  margin-top:10px;
  padding-top:15px;
  border:1px solid green;
  border-radius:10px;
  margin-bottom:20px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
}
body{
	font-family:verdana;
}

img {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 150px;
}
  </style>
  </head>
  <body onload="load()">
  <div class="container-fluid"> 
 <h2 style="text-align:center;color:#ff0000;"><i class="fas fa-book"></i> Online Book Bank <i class="fas fa-book"></i></h2>
<div style="text-align:center;">
  <a  href='index.php'><button type='button' style='margin-top:10px;text-align:center;' class='btn btn-success'><span style='font-size:;'><i class='fas fa-search'></i></span> Search another book </button></a>
<br><br>
  </div>
  <!--Loader -->
  <div id="loader" style="">
  <?php include 'preloader.php'; ?>
  <h5 class="text-center"><i><b>fetching...</b></i></h5><br><br>
</div>
  <script>

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("demo").style.display = "block";
}
function load(){
	myVar = setTimeout(showPage, 3000);
	
}
</script>
  
  <div id="demo" style="display:none;">
<?php 
$q=str_replace(" ","+",$_GET['q']);
$filter=$_GET['filter'];
$orderBy=$_GET['orderBy'];
$startIndex=$_GET['startIndex'];
if($filter=="all"){
$var1 = "https://www.googleapis.com/books/v1/volumes?maxResults=20&q=".$q."&orderBy=".$orderBy."&startIndex=".$startIndex."";
//$var2 = urlencode($_POST['search']);
//$str = str_replace(" ", "+", $var2);
}
else{
$var1 = "https://www.googleapis.com/books/v1/volumes?maxResults=20&filter=".$filter."&q=".$q."&orderBy=".$orderBy."&startIndex=".$startIndex."";
	
}
$page = $var1;

//header ("location:$page");
$data = (file_get_contents($page));

$json = json_decode($data, true);
//echo $json['totalItems']."<br>";
//$pc=($json['totalItems']/40);
if(isset($json['items'])){
foreach($json['items'] as $item){
	echo "
	<div class='row text-center'>
  <div class='col-sm-4'></div>
  <div class='col-sm-4 polaroid'>";
echo "<b>Title:</b> ".$item['volumeInfo']['title']."<br>";
if(isset($json['volumeInfo']['subtitle'])){
	echo "<b>SubTitle:</b> ".$item['volumeInfo']['subtitle']."<br>";

}
echo "<b>Authors:</b> ";
if(isset($item['volumeInfo']['authors'])){
foreach($item['volumeInfo']['authors'] as $au){
	echo $au.", ";
}
}
else {
	echo "No Authors Found";
}
echo "<br><b>ISBN: </b>";
if(isset($item['volumeInfo']['industryIdentifiers'])){
	foreach($item['volumeInfo']['industryIdentifiers'] as $isbn){
		echo $isbn['identifier'].", ";
		
	}
	
}
else{
	echo "No ISBN Found";
}
if(isset($item['volumeInfo']['publishedDate'])){
echo "<br><b>Published Date: </b>".$item['volumeInfo']['publishedDate'];
}
if(isset($item['volumeInfo']['imageLinks']['thumbnail'])){
echo "<br><b>Cover Page:</b><br><img src='".$item['volumeInfo']['imageLinks']['thumbnail']."'><br>";
}
if(isset($item['volumeInfo']['pageCount'])){
echo "<br><b>Length:</b> ".$item['volumeInfo']['pageCount']." pages<br>";
}
echo "<br><a target='_blank' href='".$item['volumeInfo']['infoLink']."'><button type='button' class='btn btn-success'><i class='fa fa-eye'></i> View Info</button></a>&nbsp;";
if(isset($item['accessInfo']['pdf']['acsTokenLink'])){
	echo "<a target='_blank' href='".$item['accessInfo']['pdf']['acsTokenLink']."'><button type='button' class='btn btn-success'><i class='fa fa-download'></i> Download ACSM</button></a><br><br>
";
	}
	if(isset($item['accessInfo']['pdf']['downloadLink'])){
	echo "<br><br><a target='_blank' href='".$item['accessInfo']['pdf']['downloadLink']."'><button type='button' class='btn btn-success'><i class='fa fa-download'></i> Download PDF</button></a>
";
	}
echo "&nbsp;<a target='_blank' href='".$item['accessInfo']['webReaderLink']."'><button type='button' class='btn btn-success'><i class='fab fa-readme'></i> Read Online</button></a>
";


echo "
<br><br></div>
<div class='col-sm-4'></div>
</div>


";


}

?>
</div>
<div class="container-fluid">
<div class="row text-center" style="margin-bottom:5px;padding:10px;">
<div class="col-sm-4"></div>
<div class="col-sm-4">
<?php


	
	$prev=$startIndex-20;
	$next=$startIndex+20;
	if($prev>=0){
	echo "<a href='get-books.php?q=".$q."&startIndex=".$prev."&filter=".$filter."&orderBy=".$orderBy."'><button type='button' style='float:left;margin-top:10px;' class='btn btn-default'><span style='font-size:18px;'><i class='fas fa-arrow-circle-left'></i></span> Previous</button></a>
	";}
echo "<a href='get-books.php?q=".$q."&startIndex=".$next."&filter=".$filter."&orderBy=".$orderBy."'><button type='button' style='float:right;margin-top:10px;' class='btn btn-default'>Next <span style='font-size:18px;'><i class='fas fa-arrow-circle-right'></i></span></button></a>
";
	
	
}
else {
	echo "<center>No results found..</center>";
}
	?>

</div>
<div class="col-sm-4"></div>
</div>
<h5 style="text-align: center;"><b>Idea By</b> </h5>
  <h6 style="text-align:center;"><a target="_blank" title="Sv Mohan Kumar" style="text-decoration:none;" href="https://www.linkedin.com/in/mohan-s-v-502a61147/">Sv Mohan Kumar</a></h6>
  <h5 style="text-align:center;"><b>Powered By</b></h5>
<h6 style="text-align:center;"><a target="_blank" title="Cse Smart Class" style="text-decoration:none;" href="http://www.csesmartclass.com/">Cse Smart Class</a></h6><br><br><br><br><br>
</div>
</div>
<div>
  

</div>
</body>
</html>