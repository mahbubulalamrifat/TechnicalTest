   
let editCategoryData = document.getElementsByClassName("editCategory");

for (let i = 0; i < editCategoryData.length; i++) {
	editCategoryData[i].addEventListener("click", function () {
		let b = this.parentNode.parentNode.cells[0].textContent;
		document.getElementById("catID").value = b;
		let c = this.parentNode.parentNode.cells[1].textContent;
		document.getElementById("catName").value = c;
	});
}
