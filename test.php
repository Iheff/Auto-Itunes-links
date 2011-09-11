 
<script type="text/javascript">
jQuery.noConflict();
    jQuery(document).ready(function () {


   var url = 'lookup.php';


 	query = jQuery("h2.itemTitle").text().replace('  ','').replace(' - ', '+').replace(' ', '+');


 	var newQuery = query.replace('  ','').replace(' - ', '+').replace(' ', '+').replace('(', '').replace(')', '').replace(' ', '+').replace('Ft', '').replace('Ft.', '').replace('ft', '').replace('Featuring', '+');
 	var newQuery1 = newQuery.match(/\w*\+\w*\+\w*/);
 	//alert(newQuery1); // Alert to show actual Query
 	var newQuery2 = newQuery.match(/\w*\+\w*/);



 	jQuery.getJSON(url, {
 		term: newQuery1,
 		entity: 'song'
 	}, function (json) {


 		if (json.resultCount == 0) { //alert('no results');
 			//alert(newQuery2); // Alert to show actual Query
 			jQuery.getJSON(url, {
 				term: newQuery2,
 				entity: 'song'
 			}, function (json) {


 				if (json.resultCount == 0) { //alert('no results');
 					//alert(newQuery2); // Alert to show actual Query
 				} else {

 					jQuery('#results').append('<h2>Itunes Search Results</h2>');

 					for (var i = 0; i < json.results.length; i++) {
 						//alert(json.results[i].artistName); 
 						//To do : Add looping for resultsCount
 				var trackUrl = 'http://click.linksynergy.com/fs-bin/stat?id=zd9dESSndVM&offerid=146261&type=3&subid=0&tmpid=1826&RD_PARM1=' + encodeURI(json.results[i].trackViewUrl) + '&partnerId%253D30';
 				var imageUrl = json.results[i].artworkUrl60;
 				var artistName = json.results[i].artistName;
 				var artistUrl = 'http://click.linksynergy.com/fs-bin/stat?id=zd9dESSndVM&offerid=146261&type=3&subid=0&tmpid=1826&RD_PARM1=' +json.results[i].artistViewUrl+ '&partnerId%253D30';
 				var trackName = json.results[i].trackName;
 				// var trackUrl = json.results[i].trackViewUrl;
 				var albumUrl = 'http://click.linksynergy.com/fs-bin/stat?id=zd9dESSndVM&offerid=146261&type=3&subid=0&tmpid=1826&RD_PARM1=' +json.results[i].collectionViewUrl+ '&partnerId%253D30';
 				var albumName = json.results[i].collectionName;
				

 						jQuery('#results').append(' \
			   <div class="iTunesResults">\
				   <a target="_blank" class="iTunesImage" href="' + trackUrl + '">\
					<img src="' + imageUrl + '" />\
				   </a>\
				   <a target="_blank" class="iTunesArtistName" href="' + artistUrl + '">' + artistName + '</a>\
				   <a  class="iTunesTrackName" target="_blank" href="' + trackUrl + '">' + trackName + '</a>\
				   <a target="_blank" class="iTunesLink" href="' + trackUrl + '"></a>\
				   \
				   <br/>\
			   </div>\
			   ');

 						//alert("type: " + json.results[0].kind);
 						//alert("description: " + json.results[0].description);
 						//alert("artistName: " + json.results[0].artistName);
 						//$('#results').html(console.log(json));
 						// use html console to inspect the rest of this object
 					}
 				}
 			});



 		} else {

 			jQuery('#results').append('<h2>Itunes Search Results</h2>');

 			for (var i = 0; i < json.results.length; i++) {
 				//alert(json.results[i].artistName); 
 				//To do : Add looping for resultsCount
 				var trackUrl = 'http://click.linksynergy.com/fs-bin/stat?id=zd9dESSndVM&offerid=146261&type=3&subid=0&tmpid=1826&RD_PARM1=' + encodeURI(json.results[i].trackViewUrl) + '&partnerId%253D30';
 				var imageUrl = json.results[i].artworkUrl60;
 				var artistName = json.results[i].artistName;
 				var artistUrl = 'http://click.linksynergy.com/fs-bin/stat?id=zd9dESSndVM&offerid=146261&type=3&subid=0&tmpid=1826&RD_PARM1=' +json.results[i].artistViewUrl+ '&partnerId%253D30';
 				var trackName = json.results[i].trackName;
 				// var trackUrl = json.results[i].trackViewUrl;
 				var albumUrl = 'http://click.linksynergy.com/fs-bin/stat?id=zd9dESSndVM&offerid=146261&type=3&subid=0&tmpid=1826&RD_PARM1=' +json.results[i].collectionViewUrl+ '&partnerId%253D30';
 				var albumName = json.results[i].collectionName;

 				jQuery('#results').append(' \
			   <div class="iTunesResults">\
				   <a target="_blank" class="iTunesImage" href="' + trackUrl + '">\
					<img src="' + imageUrl + '" />\
				   </a>\
				   <a target="_blank" class="iTunesArtistName" href="' + artistUrl + '">' + artistName + '</a>\
				   <a  class="iTunesTrackName" target="_blank" href="' + trackUrl + '">' + trackName + '</a>\
				   <a target="_blank" class="iTunesLink" href="' + trackUrl + '"></a>\
				   \
				   <br/>\
			   </div>\
			   ');

 				//alert("type: " + json.results[0].kind);
 				//alert("description: " + json.results[0].description);
 				//alert("artistName: " + json.results[0].artistName);
 				//$('#results').html(console.log(json));
 				// use html console to inspect the rest of this object
 			}
 		}
 	});

 });
</script>
<style>
.iTunesImage {float:left; clear:both;   border: 0px solid #CCCCCC;}
.iTunesResults { border: 0 solid #CCCCCC;
    clear: none;
    float: left;
    line-height: 12px;
    margin-bottom: 5px;
    margin-right: 5px;
    overflow: hidden;
    width: 183px;
	padding:5px;
	background: #40A9A9;
}
.iTunesResults br{clear:both; line-height:0px;}
.iTunesResults a{   
    display: block;
    font-family: arial;
    font-size: 12px;
    margin-bottom: 5px;
    text-decoration: none;
	margin-left:70px; font-weight:bold;color:#fff;}
	.iTunesResults a.iTunesImage{ margin-left:0px;}
	.component h2 {
    color: #40A9A9;
}
</style>

<!--<input type="text" id="query"/>
<button>search</button>
<br/>-->

<div id="results"></div>
