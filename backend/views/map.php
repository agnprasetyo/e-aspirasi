<form>
	<div class="description">
		<ul>
			<li>You can set your own latitude, longitude and zoom values. The map shows your data after pressing the update button.</li>
			<li>You can still hide the Zoom field (or any other fields)</li>
		</ul>
		<br/><br/>
		Move the marker, double click on the map, search, or set new values to interact.
	</div>

	<fieldset class="gllpLatlonPicker">
		<input type="text" class="gllpSearchField">
		<input type="button" class="gllpSearchButton" value="search">
		<br/><br/>
		<div class="gllpMap">Google Maps</div>
		<br/>
		lat/lon:
			<input type="text" class="gllpLatitude" value="20"/>
			/
			<input type="text" class="gllpLongitude" value="20"/>
		zoom: <input type="text" class="gllpZoom" value="3"/>
		<input type="button" class="gllpUpdateButton" value="update map">
		<br/>
	</fieldset>
</form>
