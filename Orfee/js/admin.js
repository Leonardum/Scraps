// Shows the amount of characters to type left in a text area.
function countdown(textId, x, displayId) {
	var charsTyped = document.getElementById(textId).value.length;
	var charsLeft = x - charsTyped;
	charsLeftDisplay = document.getElementById(displayId);
	charsLeftDisplay.innerHTML = "Characters left: " + charsLeft;
}