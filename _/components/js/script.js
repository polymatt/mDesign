//
// Scripts
//

// date effect

function date() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; 

    var yyyy = today.getFullYear();
    if(dd < 10){
        dd = '0' + dd;
    } 
    if(mm < 10){
        mm = '0' + mm;
    } 
    // dash included in JavaScript (vs. element) to degrade more gracefully if mjs.design user has JavaScript disabled
    today = dd + '/' + mm + '/' + yyyy;
    document.getElementById("date").innerHTML = " - " + today;
}

date();


// apply .clicked class to other_projects.html interaction design entry

$(document).ready(function(){
	$("#gif-circle").click(function() {
		$(this).fadeTo(80, 0.52).fadeTo(80, 1.0);
		setTimeout(function() {
			$("#gif-lineWrapper").toggleClass("clicked");
		}, 185);
	});
});


// remove :hover effects on mobile


function hoverTouchUnstick() {
  // check if the device supports touch events
  if('ontouchstart' in document.documentElement) {
    // loop through each stylesheet
    for(var sheetI = document.styleSheets.length - 1; sheetI >= 0; sheetI--) {
      var sheet = document.styleSheets[sheetI];
      // verify if cssRules exists in sheet
      if(sheet.cssRules) {
        // loop through each rule in sheet
        for(var ruleI = sheet.cssRules.length - 1; ruleI >= 0; ruleI--) {
          var rule = sheet.cssRules[ruleI];
          // verify rule has selector text
          if(rule.selectorText) {
            // replace hover psuedo-class with active psuedo-class
            rule.selectorText = rule.selectorText.replace(":hover", ":active");
          }
        }
      }
    }
  }
}



