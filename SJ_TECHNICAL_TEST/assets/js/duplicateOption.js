var drop = document.getElementById("categoryOpt");

[].slice.call(drop.options).map(function (a) {
	if (this[a.value]) {
		drop.removeChild(a);
	} else {
		this[a.value] = 1;
	}
}, {});

var drop2 = document.getElementById("statusOpt");

[].slice.call(drop2.options).map(function (b) {
	if (this[b.value]) {
		drop2.removeChild(b);
	} else {
		this[b.value] = 1;
	}
}, {});
