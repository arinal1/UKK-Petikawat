function seat(jml, booked){
	var seatContainer = $("#seat");
	var row = parseInt(jml/4);
	var sisa = jml%4;
	var seat = [];
	var temp = '';
	for (var i = 0; i < 4; i++) {
		for (var j = 0; j < row; j++) {
			temp = temp + "<button id="+ (i+1) + (j+1) +" class='btn btn-warning btn-seat' onClick='btnSeat(this)' type='button'></button>";
		}
		if (i%2 == 0) {
			seat.push("<div class='row margin-top-10'><div class='col col-md-12 text-align-center'><span class='margin-right-2 no-seat'>" + (i+1) + "</span>"+ temp +"</div></div>");
		} else{
			seat.push("<div class='row'><div class='col col-md-12 text-align-center'><span class='margin-right-2 no-seat'>" + (i+1) + "</span>"+ temp +"</div></div>");
		}
		
		temp = '';
	}
	temp = "<div class='col col-md-12 text-align-center'>";
	for (var j = 0; j < row; j++) {
		var klas = '';
		((j==0)?klas='no-seat margin-left-32' : klas='no-seat');
		temp = temp + "<span class='"+klas+"'>"+ (j+1) + "</span>";
	}
	seatContainer.append(seat);
	seatContainer.append("<div class='row'>"+temp+"</div></div>");

	var bRow, bCol;
	for (var i = 0; i < booked.length; i++) {
		bRow = booked[i].toString().substr(0,1);
		bCol = booked[i].toString().substr(1,3);
		$('.btn-seat#'+bRow+bCol).removeClass('btn-warning').addClass('btn-secondary').attr('disabled', 1);
	}
}

function btnSeat(dzis){
	if ($(dzis).attr("selected") != "selected") {
		if (book > 0) {
			$(dzis).removeClass('btn-warning').addClass('btn-success').addClass('selected').attr('selected', 1);
			book--;	
		}
	} else{
		if (book < maxBook) {
			$(dzis).removeClass('btn-success').removeClass('selected').addClass('btn-warning').removeAttr('selected');
			book++;
		}
	}
}