<?php
variables([
	VARLinkToSectionHome => true,
]);
setup_cdn();

function site_before_render() {
	autosetPageMenu([VARDontOverwriteLogo => true]);
}
