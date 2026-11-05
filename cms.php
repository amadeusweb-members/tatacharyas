<?php
variables([
	VARLinkToSectionHome => true,
]);

setup_cdn();

if (nodeIs(SITEHOME))
	setHtmlVariable(VARWelcomeMessage, getSnippet('welcome'));

function site_before_render() {
	autosetPageMenu([VARLinkToSubnodeHome => true, VARDontOverwriteLogo => true]);
}
