class Topbar extends HTMLElement {
	connectedCallback() {
		this.innerHTML =
			'<header class="header"><nav class="navbar"><a href="#" class="nav-logo"><img src="assets/img/logo.jpg" alt="" height="70px"></a><ul class="nav-menu"><li class="nav-item"><a href="index.php" class="nav-link">Home</a></li><li class="nav-item"><a href="allevents.php" class="nav-link">Events</a></li></ul><div class="hamburger"><span class="bar"></span><span class="bar"></span><span class="bar"></span></div></nav></header>';
	}
}
window.customElements.define("top-bar", Topbar);
