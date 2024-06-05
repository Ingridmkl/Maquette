<!DOCTYPE html>
<html>
<body>

<h2>Chargement de la photo de profil</h2>
Choisissez une image à charger :
<input type="file" id="myFile" accept="image/*" onchange="loadFile(event)">
<br><br>
Image prévisualisée ici :
<br>
<img id="output" style="width:200px">

<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>

</body>
</html>
