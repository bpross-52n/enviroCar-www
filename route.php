<?
include('header.php');
?>

<div id="loadingIndicator" class="loadingIndicator">
  <div style="background:url(./assets/img/ajax-loader.gif) no-repeat center center; height:100px;"></div>
</div>

<script src="./assets/OpenLayers/OpenLayers.light.js"></script>
<script src="./assets/js/geojsontools.js"></script>
<style>
    img.olTileImage {
        max-width: none;
      }


    .olControlAttribution{
    bottom:0px;
    }


      .mapContainer{
          height:300px; 
          width:300px;
      }
      @media (min-width: 500px) {
      .mapContainer{
          height:500px; 
          width:500px;
      }

    .olPopup{
      font-size: 16px;
      padding: 5px 0;
      margin: 2px 0 0;
      border: 1px solid #ccc;
      border: 1px solid rgba(0, 0, 0, 0.2);
      -webkit-border-radius: 6px;
      -moz-border-radius: 6px;
      border-radius: 6px;
      -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
      -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
      -webkit-background-clip: padding-box;
      -moz-background-clip: padding;
      background-clip: padding-box;
    }
    

</style>

<div class="container">

  <div class="span5">
  <div id="loadingIndicator_route" style="background:url(./assets/img/ajax-loader.gif) no-repeat center center; height:100px;"></div>
    <div style="max-height:400px; overflow:auto;">
      <div id="routeInformation"></div>
      <div id="routeStatistics"></div>
    </div>
    <div id="furtherInformation"></div>

          
  </div>
    <div class="span7 mapContainer">
      <div id="map" style="height: 100%; width:100%;">
      </div>
    </div>  
  </div>

  
<script type="text/javascript">

  var popup;

  (function(){
    var s = window.location.search.substring(1).split('&');
      if(!s.length) return;
        var c = {};
        for(var i  = 0; i < s.length; i++)  {
          var parts = s[i].split('=');
          c[unescape(parts[0])] = unescape(parts[1]);
        }
      window.$_GET = function(name){return name ? c[name] : c;}
  }())

  function convertToLocalTime(serverDate) {
      var dt = new Date(Date.parse(serverDate));
      var localDate = dt;


      var gmt = localDate;
          var min = gmt.getTime() / 1000 / 60; // convert gmt date to minutes
          var localNow = new Date().getTimezoneOffset(); // get the timezone
          // offset in minutes
          var localTime = min - localNow; // get the local time

      var dateStr = new Date(localTime * 1000 * 60);
      var d = dateStr.getDate();
      var m = dateStr.getMonth() + 1;
      var y = dateStr.getFullYear();

      var totalSec = dateStr.getTime() / 1000;
      var hours = parseInt( totalSec / 3600 ) % 24;
      var minutes = parseInt( totalSec / 60 ) % 60;


      return '' + y + '-' + (m<=9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d) + ' ' + hours +':'+ (minutes <= 9 ? '0' + minutes : minutes);
    }

  function addRouteInformation(name, start, end){
      $('#routeInformation').append('<h2>'+name+'</h2><p>Start: '+start+'</p><p>End: '+end+'</p>');
      $('#furtherInformation').append('<p><a class="btn" href="graph.php?id='+$_GET(['id'])+'"><? echo $graphs ?></a><a class="btn" href="thematic_map.php?id='+$_GET(['id'])+'"><? echo $thematicmaps ?></a><a class="btn" target="_blank" href="https://giv-car.uni-muenster.de/stable/rest/tracks/'+$_GET(['id'])+'" download="enviroCar_track_'+$_GET(['id'])+'.geojson">Download (GeoJSON)</a></p>');
  }

  function onFeatureSelect(feature){
    popup = new OpenLayers.Popup("chicken",
                       feature.geometry.getBounds().getCenterLonLat(),
                       new OpenLayers.Size(200,200),
                       getContent(),
                       true);

    map.addPopup(popup);

    function getContent(){
      var output = "<b>"+convertToLocalTime(feature.attributes.time)+"</b><br>";
      for(property in feature.attributes.phenomenons){
        output += property+": "+feature.attributes.phenomenons[property].value+"<br>";
      }
      return output;
    }

  }


  function onFeatureUnselect(feature){
      popup.destroy();
      popup = null;
  }


    var map = new OpenLayers.Map('map');
    //var mapnik = new OpenLayers.Layer.OSM();
    //map.addLayer(mapnik);


    var grey = new OpenLayers.Layer.OSM('Simple OSM Map', null, {
    eventListeners: {
        tileloaded: function(evt) {
            var ctx = evt.tile.getCanvasContext();
            if (ctx) {
                var imgd = ctx.getImageData(0, 0, evt.tile.size.w, evt.tile.size.h);
                var pix = imgd.data;
                for (var i = 0, n = pix.length; i < n; i += 4) {
                    pix[i] = pix[i + 1] = pix[i + 2] = (3 * pix[i] + 4 * pix[i + 1] + pix[i + 2]) / 8;
                }
                ctx.putImageData(imgd, 0, 0);
                evt.tile.imgDiv.removeAttribute("crossorigin");
                evt.tile.imgDiv.src = ctx.canvas.toDataURL();
            }
        }
    }
  });

    map.addLayer(grey);



    map.setCenter(new OpenLayers.LonLat(7.9,51,9) // Center of the map
      .transform(
        new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
        new OpenLayers.Projection("EPSG:900913") // to Spherical Mercator Projection
      ),8
    );
    
  
  //var styleMap = new OpenLayers.StyleMap({pointRadius: 10});
  var co2_style = new OpenLayers.StyleMap(
    { 
            "default": new OpenLayers.Style({ 
                fillColor: "${getColor}",
                strokeWidth: 1,             
                strokeColor: "#000", 
                fillOpacity: 1,
                pointRadius: 10//"${getSize}"
                //label: "${getLabel}"                  
            },
            {
                context: {
                    getColor : function (feature) {
                        return feature.attributes.phenomenons.testphenomenon1.value > 20 ? '#FF0000' :
                               feature.attributes.phenomenons.testphenomenon1.value > 10 ? '#FF5A08' :
                                                                  '#08FF41' ;
                    },
          getSize: function(feature) {
            console.log(100 / feature.layer.map.getResolution());
            return 100 / feature.layer.map.getResolution();
          }
                } 
            })
    }
  );
  var geojson_layer = new OpenLayers.Layer.Vector("Measurements");
  var geojson_line = new OpenLayers.Layer.Vector("lines");
                  
    
    var geojson_format = new OpenLayers.Format.GeoJSON({
                'internalProjection': new OpenLayers.Projection("EPSG:900913"),
                'externalProjection': new OpenLayers.Projection("EPSG:4326")
            });
 

  map.addLayer(geojson_line);
  map.addLayer(geojson_layer);



    selectControl = new OpenLayers.Control.SelectFeature(geojson_layer, {
            onSelect: onFeatureSelect,
            onUnselect: onFeatureUnselect
        });
    map.addControl(selectControl);
    selectControl.activate();
      


  //GET the information about the specific track
  $.get('assets/includes/users.php?track='+$_GET(['id']), function(data) {
    if(data >= 400){
      console.log(data);
      if(data == 400){
          error_msg("<? echo $routeError ?>");
      }else if(data == 401 || data == 403){
        error_msg("<? echo $routeNotAllowed ?>")
      }else if(data == 404){
        error_msg("<? echo $routeNotFound ?>")
      }
      $('#loadingIndicator').hide();
    }else{
      geojson_layer.addFeatures(geojson_format.read(data));
      map.zoomToExtent(geojson_layer.getDataExtent());

      geojson_line.addFeatures(geojson_format.read(JSON.stringify(GeoJSONTools.points_to_lineString(data).features)));


      data = JSON.parse(data);
      addRouteInformation(data.properties.name, convertToLocalTime(data.features[0].properties.time), convertToLocalTime(data.features[data.features.length - 1].properties.time));
      if(data.properties.sensor.properties != null){
        if(data.properties.sensor.properties.model)$('#routeInformation').append('<p>Model: '+data.properties.sensor.properties.model+'<br>');
        if(data.properties.sensor.properties.fuelType)$('#routeInformation').append('<p><? echo $fuelType ?>: '+data.properties.sensor.properties.fuelType+'<br>');
        if(data.properties.sensor.properties.constructionYear)$('#routeInformation').append('<p><? echo $constructionYear ?>: '+data.properties.sensor.properties.constructionYear+'<br>');
        if(data.properties.sensor.properties.manufacturer)$('#routeInformation').append('<p><? echo $manufacturer ?>: '+manufacturer+'/p><br>');
      }

      $('#loadingIndicator').hide();
    }
    
  });

    $.get('assets/includes/users.php?trackStatistics='+$_GET(['id']), function(data) {
      if(data >= 400){
        console.log(data);
        if(data == 400){
            error_msg("<? echo $statisticsError ?>");
        }else if(data == 401 || data == 403){
          error_msg("<? echo $statisticsNotAllowed ?>")
        }else if(data == 404){
          error_msg("<? echo $statisticsNotFound ?>")
        }
        $('#loadingIndicator_route').hide();
      }else{
      data = JSON.parse(data);

      for(i = 0; i < data.statistics.length; i++){
        $('#routeStatistics').append('<p>&Oslash;  '+data.statistics[i].phenomenon.name+': '+Math.round(data.statistics[i].avg*100)/100+'  '+data.statistics[i].phenomenon.unit+'</p');
      }
      
    }
   $('#loadingIndicator_route').hide(); 
  });


</script>   

<?
include('footer.php');
?>
